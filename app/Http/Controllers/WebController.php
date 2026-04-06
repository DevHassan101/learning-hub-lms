<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionMail;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Category;
use App\Models\Course;
use App\Models\DynamicContent;
use App\Models\ExamQuestion;
use App\Models\Lesson;
use App\Models\Plan;
use App\Models\QuizQuestion;
use App\Models\User;
use App\Models\UserCourse;
use App\Models\UserExam;
use App\Models\UserExamAnswer;
use App\Models\UserLesson;
use App\Models\UserQuiz;
use App\Models\UserQuizAnswer;
use App\Models\UserSubscription;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;
use Unicodeveloper\Paystack\Facades\Paystack;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class WebController extends Controller
{
    public function index()
    {
        $courses = Course::with('lessons')->get();
        $plans = Plan::get();
        if (Auth::user()) {
            $activeSubscriptions = UserSubscription::where([['user_id', Auth::user()->id], ['status', 'active']])->get();
        } else {
            $activeSubscriptions = [];
        }
        $nclex = Plan::where('name', 'NCLEX & IELTS')->first();
        $dynamicContent = DynamicContent::where('url', '/')
            ->first()
            ->dynamicContentFields;

            $testimonials = Testimonial::get();

        return view('website.pages.index', compact('courses', 'plans', 'activeSubscriptions', 'nclex', 'dynamicContent','testimonials'));
    }

    public function programs()
    {
        $categories = Category::whereNot('title', 'NCLEX & IELTS')->get();
        return view('website.pages.programs', compact('categories'));
    }
    public function disclaimer()
    {
        return view('website.pages.disclaimer');
    }
    public function aboutUs()
    {
        $dynamicContent = DynamicContent::where('url', '/about-us')
            ->first()
            ->dynamicContentFields;
        return view('website.pages.about-us', compact('dynamicContent'));
    }
    public function termsAndConditions()
    {
        return view('website.pages.terms-and-conditions');
    }
    public function privacyPolicy()
    {
        return view('website.pages.privacy-policy');
    }
    public function course()
    {
        $courses = Course::with('lessons')->get();
        $categories = Category::get();
        return view('website.pages.course', compact('courses', 'categories'));
    }

    public function getCourses(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'error' => false,
                'html' => '<h1 class="col-span-3">To access our courses, you have to login first.<a class="font-medium hover:underline text-[#493BE6]" href="' . url("login") . '">login now</a></h1>'
            ]);
        }
        $userHaveSubscription = false;
        $userSubscriptions = UserSubscription::where('user_id',  Auth::id())->where('status', 'active')->get();
        foreach ($userSubscriptions as $userSubscription) {
            if ($userSubscription->plan->category_id == $request->category) {
                $userHaveSubscription = true;
            }
        }

        if (!$userHaveSubscription && $userSubscriptions) {
            return response()->json([
                'error' => false,
                'html' => '<h1 class="bg-white border-2 border-[#3bcbb3]/40 p-3 pl-5 rounded-2xl col-span-2 text-md text-gray-600 font-medium">You have not enrolled in this department. To access the courses, please enroll first.<a class="font-semibold hover:underline text-[#3bcbbe]" href="' . url("programs") . '"> <br> View Departments</a></h1>'
            ]);
        }

        $query = Course::with('lessons');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
        $courses = $query->get();
        return response()->json([
            'error' => false,
            'html' => view('website.pages.course-card', compact('courses'))->render()
        ]);
    }


    public function courseDetail($slug)
    {
        $course = Course::with('lessons')->where('slug', $slug)->firstOrFail();
        $userEnrolledInCourse = false;
        if (Auth::user()) {
            if (UserCourse::where('user_id', Auth::user()->id)->where('course_id', $course->id)->exists()) {
                $userEnrolledInCourse = true;
            } else {
                $userEnrolledInCourse = false;
            }
        }
        return view('website.pages.course-detail', compact('course', 'userEnrolledInCourse'));
    }
    public function courseQuiz($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $userId = Auth::id();
        $planIds = $course->category->plans->pluck('id')->toArray();

        $userSubscriptions = UserSubscription::where('user_id', $userId)
            ->whereIn('plan_id', $planIds)
            ->get();
        $activeSubscription = false;
        if ($userSubscriptions) {
            foreach ($userSubscriptions as $userSubscription) {
                if ($userSubscription->status == 'active') {
                    $activeSubscription = true;
                }
            }
        } else {
            return redirect()->back()->with('error', 'You do not have subscription of this program.');
        }
        if (!$activeSubscription) {
            return redirect()->back()->with('error', 'Your subscription has been expired.');
        }
        $userCourse = UserCourse::where('user_id', Auth::user()->id)->where('course_id', $course->id)->first();
        if (!$userCourse) {
            return redirect()->back()->with('error', 'You have to enroll in this course.');
        }
        return view('website.pages.course-quiz', compact('slug', 'course'));
    }
    public function startQuiz($course, $type)
    {
        $course = Course::where('slug', $course)->firstOrFail();
        $quizQuestions = QuizQuestion::where('course_id', $course->id)->where('type', str_replace('-', ' ', $type))->whereNull('lesson_id')->get();
        if (count($quizQuestions) == 0) {
            return redirect()->back()->with('error', 'Quiz not available');
        }

        $quizId = Str::uuid();
        UserQuiz::create([
            'user_quiz_id' => $quizId,
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'start_time' => now(),
            'type' => str_replace('-', ' ', $type)
        ]);
        return redirect('quiz/' . $quizId);
        // return view('website.pages.start-quiz', compact('course', 'quizQuestions', 'type'));
    }

    public function startQuiz2($quizId)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $quizId)->firstOrFail();
        $course = Course::findOrFail($userQuiz->course_id);
        $quizQuestions = QuizQuestion::where('course_id', $course->id)->where('type', $userQuiz->type)->whereNull('lesson_id')->get();
        return view('website.pages.start-quiz', compact('userQuiz', 'course', 'quizQuestions'));
    }


    public function quizResult($userQuiz)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $userQuiz)->firstOrFail();

        $totalQuestions = QuizQuestion::where([
            ['course_id', $userQuiz->course_id],
            ['type', $userQuiz->type]
        ])->whereNull('lesson_id')->count();

        $attemptedQuestions = UserQuizAnswer::where('user_quiz_id', $userQuiz->id)
            ->with('quizQuestion:id,answer')->get();

        $correctAnswers = $attemptedQuestions->filter(function ($attempt) {
            return $attempt->quizQuestion->answer === $attempt->answer;
        })->count();

        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return view('website.pages.quiz-result', compact('totalQuestions', 'attemptedQuestions', 'correctAnswers', 'percentage', 'userQuiz'));
    }
    public function quizResultAnswers($userQuiz)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $userQuiz)->firstOrFail();
        $quizQuestions = QuizQuestion::where([
            ['course_id', $userQuiz->course_id],
            ['type', $userQuiz->type]
        ])->whereNull('lesson_id')->get();
        foreach ($quizQuestions as $quizQuestion) {
            $userQuizAnswer = UserQuizAnswer::where('user_quiz_id', $userQuiz->id)->where('quiz_question_id', $quizQuestion->id)->first();
            $quizQuestion->userAnswer = $userQuizAnswer ? $userQuizAnswer->answer : '';
        }

        $totalQuestions = count($quizQuestions);
        $userQuizAnswers = UserQuizAnswer::where('user_quiz_id', $userQuiz->id)
            ->with('quizQuestion:id,answer')->get();
        $correctAnswers = $userQuizAnswers->filter(function ($attempt) {
            return $attempt->quizQuestion->answer === $attempt->answer;
        })->count();
        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;
        return view('website.pages.quiz-result-answers', compact('userQuiz', 'quizQuestions', 'correctAnswers', 'percentage'));
    }
    public function courseExam($slug)
    {
        $course = Course::with(['lessons', 'category.plans'])->where('slug', $slug)->firstOrFail();
        $userId = Auth::id();
        $planIds = $course->category->plans->pluck('id')->toArray();

        $userSubscriptions = UserSubscription::where('user_id', $userId)
            ->whereIn('plan_id', $planIds)
            ->get();
        $activeSubscription = false;
        if ($userSubscriptions) {
            foreach ($userSubscriptions as $userSubscription) {
                if ($userSubscription->status == 'active') {
                    $activeSubscription = true;
                }
            }
        } else {
            return redirect()->back()->with('error', 'You do not have subscription of this program.');
        }
        if (!$activeSubscription) {
            return redirect()->back()->with('error', 'Your subscription has been expired.');
        }
        $userCourse = UserCourse::where('user_id', Auth::user()->id)->where('course_id', $course->id)->first();
        if (!$userCourse) {
            return redirect()->back()->with('error', 'You have to enroll in this course.');
        }
        return view('website.pages.course-exam', compact('course', 'slug'));
    }
    public function startExam($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        if (count($course->examQuestions) == 0) {
            return redirect()->back()->with('error', 'Exam not available');
        }
        $examId = Str::uuid();
        UserExam::create([
            'user_exam_id' => $examId,
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'start_time' => now()
        ]);
        return redirect('exam/' . $examId);
    }
    public function startExam2($examId)
    {
        $userExam = UserExam::where('user_exam_id', $examId)->firstOrFail();
        $course = Course::findOrFail($userExam->course_id);
        $examQuestions = ExamQuestion::where('course_id', $course->id)->get();
        return view('website.pages.start-exam', compact('examId', 'course', 'examQuestions'));
    }
    public function submitExam($examId, Request $request)
    {
        $userExam = UserExam::where('user_exam_id', $examId)->firstOrFail();
        $userExam->update([
            'end_time' => now()
        ]);
        $score = 0;
        if ($request->answer) {
            foreach ($request->answer as $questionId => $answer) {
                UserExamAnswer::create([
                    'user_exam_id' => $userExam->id,
                    'exam_question_id' => $questionId,
                    'answer' => $answer
                ]);

                $examQuestion = ExamQuestion::find($questionId);

                if ($answer == $examQuestion->answer) {
                    $score++;
                }
            }
        }
        $userExam->update([
            'score' => $score
        ]);

        return redirect('course/exam/' . $userExam->user_exam_id . '/result');
    }
    public function courseLessonQuiz($slug, $lessonSlug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $lesson = Lesson::where('slug', $lessonSlug)->firstOrFail();
        $userId = Auth::id();
        $planIds = $course->category->plans->pluck('id')->toArray();

        $userSubscriptions = UserSubscription::where('user_id', $userId)
            ->whereIn('plan_id', $planIds)
            ->get();
        $activeSubscription = false;
        if ($userSubscriptions) {
            foreach ($userSubscriptions as $userSubscription) {
                if ($userSubscription->status == 'active') {
                    $activeSubscription = true;
                }
            }
        } else {
            return redirect()->back()->with('error', 'You do not have subscription of this program.');
        }
        if (!$activeSubscription) {
            return redirect()->back()->with('error', 'Your subscription has been expired.');
        }
        $userCourse = UserCourse::where('user_id', Auth::user()->id)->where('course_id', $course->id)->first();
        if (!$userCourse) {
            return redirect()->back()->with('error', 'You have to enroll in this course.');
        }
        return view('website.pages.course-lesson-quiz', compact('slug', 'course', 'lesson'));
    }
    public function startLessonQuiz($course, $lesson, $type)
    {
        $course = Course::where('slug', $course)->firstOrFail();
        $lesson = Lesson::where('slug', $lesson)->firstOrFail();
        $quizQuestions = QuizQuestion::where('course_id', $course->id)->where('lesson_id', $lesson->id)->where('type', str_replace('-', ' ', $type))->get();
        if (count($quizQuestions) == 0) {
            return redirect()->back()->with('error', 'Quiz not available');
        }

        $quizId = Str::uuid();
        UserQuiz::create([
            'user_quiz_id' => $quizId,
            'user_id' => Auth::user()->id,
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
            'start_time' => now(),
            'type' => str_replace('-', ' ', $type)
        ]);
        return redirect('lesson-quiz/' . $quizId);
    }

    public function startLessonQuiz2($quizId)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $quizId)->firstOrFail();
        $course = Course::findOrFail($userQuiz->course_id);
        $lesson = Lesson::findOrFail($userQuiz->lesson_id);
        $quizQuestions = QuizQuestion::where('course_id', $course->id)->where('lesson_id', $lesson->id)->where('type', $userQuiz->type)->get();
        return view('website.pages.start-quiz', compact('userQuiz', 'course', 'quizQuestions'));
    }

    public function quizLessonResult($userQuiz)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $userQuiz)->firstOrFail();

        $totalQuestions = QuizQuestion::where([
            ['course_id', $userQuiz->course_id],
            ['type', $userQuiz->type]
        ])->where('lesson_id', $userQuiz->lesson_id)->count();

        $attemptedQuestions = UserQuizAnswer::where('user_quiz_id', $userQuiz->id)
            ->with('quizQuestion:id,answer')->get();

        $correctAnswers = $attemptedQuestions->filter(function ($attempt) {
            return $attempt->quizQuestion->answer === $attempt->answer;
        })->count();

        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return view('website.pages.quiz-result', compact('totalQuestions', 'attemptedQuestions', 'correctAnswers', 'percentage', 'userQuiz'));
    }

    public function examResult($userExam)
    {
        $userExam = UserExam::where('user_exam_id', $userExam)->firstOrFail();

        $totalQuestions = ExamQuestion::where('course_id', $userExam->course_id)->count();

        $attemptedQuestions = UserExamAnswer::where('user_exam_id', $userExam->id)
            ->with('examQuestion:id,answer')->get();

        $correctAnswers = $attemptedQuestions->filter(function ($attempt) {
            return $attempt->examQuestion->answer === $attempt->answer;
        })->count();

        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return view('website.pages.exam-result', compact('totalQuestions', 'attemptedQuestions', 'correctAnswers', 'percentage', 'userExam'));
    }
    public function examResultAnswers($userExam)
    {
        $userExam = UserExam::where('user_exam_id', $userExam)->firstOrFail();
        $examQuestions = ExamQuestion::where('course_id', $userExam->course_id)->get();
        foreach ($examQuestions as $examQuestion) {
            $userExamAnswer = UserExamAnswer::where('user_exam_id', $userExam->id)->where('exam_question_id', $examQuestion->id)->first();
            $examQuestion->userAnswer = $userExamAnswer ? $userExamAnswer->answer : '';
        }

        $totalQuestions = count($examQuestions);
        $userExamAnswers = UserExamAnswer::where('user_exam_id', $userExam->id)
            ->with('examQuestion:id,answer')->get();
        $correctAnswers = $userExamAnswers->filter(function ($attempt) {
            return $attempt->examQuestion->answer === $attempt->answer;
        })->count();
        $percentage = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;
        return view('website.pages.exam-result-answers', compact('userExam', 'examQuestions', 'correctAnswers', 'percentage'));
    }
    public function courseLectures($course, $lecture)
    {
        $course = Course::with(['lessons', 'category.plans'])->where('slug', $course)->firstOrFail();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this course.');
        }

        $userId = Auth::id();

        $planIds = $course->category->plans->pluck('id')->toArray();

        $userSubscriptions = UserSubscription::where('user_id', $userId)
            ->whereIn('plan_id', $planIds)
            ->get();
        $activeSubscription = false;
        if ($userSubscriptions) {
            foreach ($userSubscriptions as $userSubscription) {
                if ($userSubscription->status == 'active') {
                    $activeSubscription = true;
                }
            }
        } else {
            return redirect()->back()->with('error', 'You do not have subscription of this program.');
        }
        if (!$activeSubscription) {
            return redirect()->back()->with('error', 'Your subscription has been expired.');
        }

        $userCourse = UserCourse::where('user_id', $userId)->where('course_id', $course->id)->first();

        if (!$userCourse) {
            return redirect()->back()->with('error', 'You need to enroll in this course first.');
        }

        $lecture = Lesson::where('slug', $lecture)
            ->where('course_id', $course->id)
            ->firstOrFail();

        return view('website.pages.course-lectures', compact('lecture', 'course', 'userCourse'));
    }
    public function courseLecturesPdf($course, $lecture)
    {
        $lecture = Lesson::with('course')->where('slug', $lecture)->firstOrFail();
        $course = Course::with(['lessons', 'category.plans'])->where('slug', $course)->firstOrFail();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this course.');
        }

        $userId = Auth::id();

        $planIds = $course->category->plans->pluck('id')->toArray();

        $userSubscriptions = UserSubscription::where('user_id', $userId)
            ->whereIn('plan_id', $planIds)
            ->get();
        $activeSubscription = false;
        if ($userSubscriptions) {
            foreach ($userSubscriptions as $userSubscription) {
                if ($userSubscription->status == 'active') {
                    $activeSubscription = true;
                }
            }
        } else {
            return redirect()->back()->with('error', 'You do not have subscription of this program.');
        }
        if (!$activeSubscription) {
            return redirect()->back()->with('error', 'Your subscription has been expired.');
        }

        $userCourse = UserCourse::where('user_id', Auth::user()->id)->where('course_id', $course->id)->first();
        if (!$userCourse) {
            return redirect()->back()->with('error', 'You have to enroll in this course.');
        }
        // return redirect($lecture->attachments);
        return view('website.pages.course-lectures-pdf', compact('lecture', 'userCourse'));
    }
    public function courseEnroll($course)
    {
        $user = Auth::user();
        $course = Course::where('slug', $course)->firstOrFail();
        $isSubscribed = false;
        $userSubscriptions = UserSubscription::where([['status', 'active'], ['user_id', $user->id]])->get();
        foreach ($userSubscriptions as $userSubscription) {
            if ($course->category_id == $userSubscription->plan->category_id) {
                $isSubscribed = true;
            }
        }
        if ($isSubscribed === false) {
            return redirect()->back()->with('error', 'You have to subscribed this program first.');
        }

        if (UserCourse::where('course_id', $course->id)->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        UserCourse::create([
            'user_course_id' => Str::uuid(),
            'course_id' => $course->id,
            'user_id' => $user->id
        ]);

        return redirect()->back()->with('success', 'Course enrolled successfully.');
    }



    // public function submitQuiz($quizId, Request $request)
    // {
    //     $userQuiz = UserQuiz::where('user_quiz_id', $quizId)->firstOrFail();
    //     $end = Carbon::now();
    //     $diffInSeconds = $end->diffInSeconds($userQuiz->start_time);
    //     $minutes = floor($diffInSeconds / 60);
    //     $seconds = $diffInSeconds % 60;

    //     $formattedTime = sprintf('%02d:%02d', $minutes, $seconds);
    //     $userQuiz->update([
    //         'end_time' => now(),
    //         'time_spent' => $formattedTime,
    //     ]);
    //     $score = 0;
    //     if ($request->answer) {
    //         foreach ($request->answer as $questionId => $answer) {
    //             UserQuizAnswer::create([
    //                 'user_quiz_id' => $userQuiz->id,
    //                 'quiz_question_id' => $questionId,
    //                 'answer' => $answer
    //             ]);
    //             $quizQuestion = QuizQuestion::find($questionId);
    //             if ($answer == $quizQuestion->answer) {
    //                 $score++;
    //             }
    //         }
    //     }
    //     $userQuiz->update([
    //         'score' => $score
    //     ]);

    //     return redirect('course/quiz/' . $userQuiz->user_quiz_id . '/result');
    // }

    public function submitQuiz($quizId, Request $request)
    {
        $userQuiz = UserQuiz::where('user_quiz_id', $quizId)->firstOrFail();
        $startTime =  Carbon::parse($userQuiz->start_time);
        $timeSpent = (int) $request->time_spent;
        $endAt = $startTime->copy()->addSeconds($timeSpent);

        $formattedTime = sprintf('%02d:%02d', floor($timeSpent / 60), $timeSpent % 60);

        $userQuiz->update([
            'end_time' => $endAt,
            'time_spent' => $formattedTime,
        ]);

        $score = 0;
        if ($request->answer) {
            foreach ($request->answer as $questionId => $answer) {
                UserQuizAnswer::create([
                    'user_quiz_id' => $userQuiz->id,
                    'quiz_question_id' => $questionId,
                    'answer' => $answer
                ]);
                $quizQuestion = QuizQuestion::find($questionId);
                if ($answer == $quizQuestion->answer) {
                    $score++;
                }
            }
        }

        // Save the score
        $userQuiz->update(['score' => $score]);

        return redirect('course/quiz/' . $userQuiz->user_quiz_id . '/result');
    }


    public function userLesson(Request $request)
    {
        if (UserLesson::where('lesson_id', $request->lessonId)->where('user_id', Auth::user()->id)->exists()) {
            return response()->json([
                'error' => true,
                'message' => 'Lecture already watched'
            ]);
        }
        UserLesson::create([
            'lesson_id' => $request->lessonId,
            'user_course_id' => $request->userCourseId,
            'user_id' => Auth::user()->id
        ]);
        $userCourse = UserCourse::find($request->userCourseId);
        if (count($userCourse->course->lessons) == count($userCourse->userLessons)) {
            $userCourse->status = 'completed';
            $userCourse->update();
        }
        return response()->json([
            'error' => false,
            'message' => 'Lecture added successfully'
        ]);
    }

    public function processPayment(Request $request)
    {
        // return $request->all();
        $request->validate([
            'payment_method' => 'required',
        ]);
        $startDate = Carbon::now();
        $plan = Plan::findOrFail($request->plan);
        switch ($plan->name) {
            case 'Monthly':
                $endDate = Carbon::now()->addMonth(1);
                break;
            case 'Quarterly':
                $endDate = Carbon::now()->addMonths(3);
                break;
            case 'Annually':
                $endDate = Carbon::now()->addYear(1);
                break;
            case 'All time':
                $endDate = null;
                break;
            case 'NCLEX & IELTS':
                $endDate = Carbon::now()->addMonth(1);
                break;
            default:
                $endDate = Carbon::now();
                break;
        }
        // return UserSubscription::join('plans','plans.id','=','user_subscriptions.plan_id')->where([['user_id', Auth::user()->id], ['plans.category_id', $plan->category_id], ['status', 'active']])->exists();
        if (UserSubscription::join('plans', 'plans.id', '=', 'user_subscriptions.plan_id')->where([['user_id', Auth::user()->id], ['plans.category_id', $plan->category_id], ['status', 'active']])->exists()) {
            return back()->with('error', 'You have already subscribed this package.');
        }
        // if (Auth::user()->activeSubscription()) {
        //     $subscription  = Auth::user()->activeSubscription();
        //     $subscription->update([
        //         'status' => 'expired',
        //         'expired_at' => Carbon::now(),
        //     ]);
        // }

        $userSubscription = UserSubscription::create([
            'user_subscription_id' => Str::uuid(),
            'user_id' => Auth::user()->id,
            'plan_id' => $request->plan,
            'payment_method' => $request->payment_method,
            'start_at' => $startDate,
            'end_at' => $endDate,
            'amount' => $request->amount,
            'currency' => $request->currency,
        ]);

        $paymentMethod = $request->payment_method;

        if ($paymentMethod === 'stripe') {
            return $this->processStripePayment($request, $userSubscription);
        } elseif ($paymentMethod === 'paystack') {
            return $this->processPaystackPayment($request, $userSubscription);
        } elseif ($paymentMethod === 'paypal') {
            return $this->processPaypalPayment($request, $userSubscription);
        } else {
            return back()->with('error', 'Invalid payment method selected.');
        }
    }

    private function processStripePayment(Request $request, $userSubscription)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            Charge::create([
                "amount" => $request->amount * 100,
                "currency" => $request->currency,
                "source" => $request->stripeToken,
                "description" => "Payment for " . $userSubscription->plan->name . " package"
            ]);
            $userSubscription->update([
                'status' => 'active'
            ]);
            try {
                Mail::to($userSubscription->user->email)->send(new SubscriptionMail($userSubscription->user, $userSubscription->plan));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
            return redirect('courses')->with('success', 'Stripe payment successful!');
        } catch (\Exception $e) {
            $userSubscription->update([
                'status' => 'failed'
            ]);
            return back()->with('error', 'Stripe payment failed: ' . $e->getMessage());
        }
    }

    private function processPaystackPayment(Request $request, $userSubscription)
    {
        try {
            $paymentRef = Paystack::genTranxRef();
            $userSubscription->update(['reference' => $paymentRef]);

            return Paystack::getAuthorizationUrl([
                "amount" => $request->amount * 100,
                "email"  => $userSubscription->user->email,
                "reference" => $paymentRef,
                "currency" => $request->currency
            ])->redirectNow();
        } catch (\Exception $e) {
            $userSubscription->update([
                'status' => 'failed'
            ]);
            Log::error('Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Paystack payment failed: ' . $e->getMessage());
        }
    }

    public function paystackCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if (!$paymentDetails || !isset($paymentDetails['data'])) {
            return redirect()->route('courses')->with('error', 'Payment verification failed.');
        }

        $reference = $paymentDetails['data']['reference'];
        $status    = $paymentDetails['data']['status'];

        $userSubscription = UserSubscription::where('reference', $reference)->first();
        // return $paymentDetails;

        if (!$userSubscription) {
            return redirect()->back()->with('error', 'Subscription not found for this transaction reference.');
        }

        if ($status === 'success') {
            $userSubscription->update(['status' => 'active']);

            // Mail::to($userSubscription->user->email)->send(new SubscriptionMail(...));

            return redirect('courses')->with('success', 'Payment successful via Paystack!');
        } else {
            $userSubscription->update(['status' => 'failed']);

            return redirect()->back()->with('error', 'Payment unsuccessful via Paystack.');
        }
    }



    // ✅ PayPal Payment
    private function processPaypalPayment(Request $request, $userSubscription)
    {
        $paypal = new PayPalClient;
        $paypal->setApiCredentials(config('paypal'));
        $paypalToken = $paypal->getAccessToken();

        $response = $paypal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $request->currency,
                        "value" => $request->amount
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal-success', ['subscriptionId' => $userSubscription->user_subscription_id]),
                "cancel_url" => route('paypal-cancel', ['subscriptionId' => $userSubscription->user_subscription_id])
            ]
        ]);

        if (isset($response['id']) && $response['status'] == "CREATED") {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return back()->with('error', 'PayPal payment failed.');
    }

    public function paypalSuccess($subscriptionId)
    {
        UserSubscription::where('user_subscription_id', $subscriptionId)->update([
            'status' => 'active',
        ]);
        return redirect('courses')->with('success', 'Payment successful!');
    }
    public function paypalCancel($subscriptionId)
    {
        UserSubscription::where('user_subscription_id', $subscriptionId)->update([
            'status' => 'failed',
        ]);
        return redirect('courses')->with('error', 'Payment unsuccessful!');
    }

    public function blogs()
    {
        $blogs = Blog::get();
        return view('website.pages.blogs', compact('blogs'));
    }
    public function blogDetail($slug)
    {
        $title = str_replace('-', ' ', $slug);
        $blog = Blog::where('title', $title)->firstOrFail();
        return view('website.pages.blog-detail', compact('blog'));
    }
    public function contactUs()
    {
        $dynamicContent = DynamicContent::where('url', '/contact-us')
            ->first()
            ->dynamicContentFields;
        return view('website.pages.contact-us', compact('dynamicContent'));
    }
    public function contactUsStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create($validatedData);

        return redirect()->back()->with('success', 'Message send successfully.');
    }
}
