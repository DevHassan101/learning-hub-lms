<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DynamicContentController;
use App\Http\Controllers\FlashCardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestimonialController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dummy-mail', function() {
    try {
        Mail::raw('This is a test email sent at ' . now(), function (Message $message) {
            $message->to('stallyons.tester31@gmail.com')
                   ->subject('Laravel Mail Test from clinedlearninghub');
        });
        
        return "Mail sent successfully! Please check your inbox and spam folder.";
    } catch (\Exception $e) {
        return "Error sending mail: " . $e->getMessage();
    }
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/users/change-status/{user}', [UserController::class, 'changeStatus'])->name('users.change-status');
    Route::resource('users', UserController::class);
    Route::resource('program', CategoryController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::post('plan-point', [CategoryController::class, 'planPointStore'])->name('plan-point.store');
    Route::get('get-points', [CategoryController::class, 'getPoints'])->name('get-points');
    Route::delete('point/{id}', [CategoryController::class, 'destroyPoint'])->name('destroy-point');
    Route::resource('course', CourseController::class);
    Route::resource('flash-card', FlashCardController::class);
    Route::put('course/{course}/update-timer', [CourseController::class, 'updateTimer'])->name('course.update-timer');
    Route::put('lesson/{lesson}/update-timer', [CourseController::class, 'updateLessonTimer'])->name('lesson.update-timer');
    Route::resource('blog', BlogController::class);
    Route::resource('contact', ContactUsController::class);

    Route::get('course/{course}/add-lesson', [CourseController::class, 'addLesson'])->name('course.add-lesson');
    Route::post('course/{course}/store-lesson', [CourseController::class, 'storeLesson'])->name('course.lesson.store');
    Route::get('course/{lesson}/edit-lesson', [CourseController::class, 'editLesson'])->name('course.edit-lesson');
    Route::put('course/{lesson}/update-lesson', [CourseController::class, 'updateLesson'])->name('course.lesson.update');
    Route::delete('lesson/{lesson}', [CourseController::class, 'deleteLesson'])->name('course.delete-lesson');

    Route::get('course/{course}/manage-quiz', [CourseController::class, 'manageQuiz'])->name('course.manage-quiz');
    Route::get('course/{course}/{lesson}/manage-lesson-quiz', [CourseController::class, 'manageLessonQuiz'])->name('course.manage-lesson-quiz');
    Route::delete('quiz/{course}', [CourseController::class, 'deleteQuiz'])->name('course.delete-quiz');
    Route::get('course/{course}/add-quiz', [CourseController::class, 'addQuiz'])->name('course.add-quiz');
    Route::get('course/{course}/{lesson}/add-quiz', [CourseController::class, 'addLessonQuiz'])->name('course.add-lesson-quiz');
    Route::post('course/{course}/store-quiz', [CourseController::class, 'storeQuiz'])->name('course.quiz.store');
    Route::post('course/{course}/{lesson}/store-lesson-quiz', [CourseController::class, 'storeLessonQuiz'])->name('course.lesson-quiz.store');
    Route::get('course/{quiz}/edit-quiz', [CourseController::class, 'editQuiz'])->name('course.edit-quiz');
    Route::post('course/{quiz}/update-quiz', [CourseController::class, 'updateQuiz'])->name('course.quiz.update');

    Route::get('course/{course}/manage-exam', [CourseController::class, 'manageExam'])->name('course.manage-exam');
    Route::delete('exam/{course}', [CourseController::class, 'deleteExam'])->name('course.delete-exam');
    Route::get('course/{course}/add-exam', [CourseController::class, 'addExam'])->name('course.add-exam');
    Route::post('course/{course}/store-exam', [CourseController::class, 'storeExam'])->name('course.exam.store');
    Route::get('course/{exam}/edit-exam', [CourseController::class, 'editExam'])->name('course.edit-exam');
    Route::post('course/{exam}/update-exam', [CourseController::class, 'updateExam'])->name('course.exam.update');
    Route::get('progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::post('notification', [NotificationController::class, 'send'])->name('notification.store');

    Route::get('manage-subscription', [PlanController::class, 'index'])->name('manage-subscription.index');
    Route::put('subscription', [PlanController::class, 'update'])->name('subscription.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CMS
    Route::get('/cms', [DynamicContentController::class, 'index'])->name('cms');
    Route::get('/cms/{page}/fields', [DynamicContentController::class, 'fields'])->name('fields');
    Route::put('/cms/{id}/fields', [DynamicContentController::class, 'updateContent'])->name('update-content');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/get-notifications', [NotificationController::class, 'getNotifications']);
    Route::get('/read-all', [NotificationController::class, 'markAsRead'])->name('read-all');

    Route::get('course/{course}/{lecture}/lectures-pdf', [WebController::class, 'courseLecturesPdf'])->name('course-lectures-pdf');
    Route::get('course/{course}/enroll', [WebController::class, 'courseEnroll'])->name('course-enroll')->middleware('user_has_subscription');
 
    Route::get('course/{course}/quiz', [WebController::class, 'courseQuiz'])->name('course-quiz')->middleware('user_has_subscription');
    Route::get('course/quiz/{userQuiz}/result', [WebController::class, 'quizResult'])->name('quiz-result')->middleware('user_has_subscription');
    Route::get('course/quiz/{quiz}/result/answers', [WebController::class, 'quizResultAnswers'])->middleware('user_has_subscription')->name('quiz-result-answers');
    Route::get('course/quiz/{course}/{type}', [WebController::class, 'startQuiz'])->name('start-quiz')->middleware('user_has_subscription');
    Route::get('quiz/{quizId}', [WebController::class, 'startQuiz2'])->middleware('user_has_subscription');
    Route::post('course/{quizId}/submit-quiz', [WebController::class, 'submitQuiz'])->middleware('user_has_subscription')->name('submit-quiz');

    Route::get('course/{course}/{lesson}/quiz', [WebController::class, 'courseLessonQuiz'])->name('course-lesson-quiz')->middleware('user_has_subscription');
    Route::get('course/quiz/{userQuiz}/result', [WebController::class, 'quizLessonResult'])->name('quiz-result')->middleware('user_has_subscription');
    // Route::get('course/quiz/{quiz}/result/answers', [WebController::class, 'quizResultAnswers'])->middleware('user_has_subscription')->name('quiz-result-answers');
    Route::get('course/quiz/{course}/{lesson}/{type}', [WebController::class, 'startLessonQuiz'])->name('start-lesson-quiz')->middleware('user_has_subscription');
    Route::get('lesson-quiz/{quizId}', [WebController::class, 'startLessonQuiz2'])->middleware('user_has_subscription');
    // Route::post('course/{quizId}/submit-quiz', [WebController::class, 'submitQuiz'])->middleware('user_has_subscription')->name('submit-quiz');

    
    Route::get('course/{course}/exam', [WebController::class, 'courseExam'])->middleware('user_has_subscription')->name('course-exam');
    Route::get('course/exam/{course}', [WebController::class, 'startExam'])->middleware('user_has_subscription')->name('start-exam');
    Route::get('exam/{examId}', [WebController::class, 'startExam2'])->middleware('user_has_subscription');
    Route::get('course/exam/{examId}/result', [WebController::class, 'examResult'])->middleware('user_has_subscription')->name('exam-result');
    Route::get('course/exam/{examId}/result/answers', [WebController::class, 'examResultAnswers'])->middleware('user_has_subscription')->name('exam-result-answers');

    Route::post('course/{examId}/submit-exam', [WebController::class, 'submitExam'])->middleware('user_has_subscription')->name('submit-exam');
    Route::post('user-lesson', [WebController::class, 'userLesson'])->middleware('user_has_subscription')->name('user-lesson');

    Route::get('course/{course}/{lecture}', [WebController::class, 'courseLectures'])->middleware('user_has_subscription')->name('course-lectures');
    Route::get('plan/{category}', [PlanController::class, 'selectPlan'])->name('select-plan');
    Route::post('plan/selected', [PlanController::class, 'selectedPlan'])->name('selected-plan');
    Route::get('payment/{plan}', [PlanController::class, 'payment'])->name('payment');
    Route::post('cancel/subscription', [PlanController::class, 'cancelSubscription'])->name('cancel-subscription');

    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile')->middleware(['auth', 'role:user']);
    Route::put('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile-update')->middleware(['auth', 'role:user']);

    Route::post('payment/process', [WebController::class, 'processPayment'])->name('payment.process');
    Route::get('/paypal-success/{subscriptionId}', [WebController::class, 'paypalSuccess'])->name('paypal-success');
    Route::get('/paypal-cancel/{subscriptionId}', [WebController::class, 'paypalCancel'])->name('paypal-cancel');
    // The name can be anything you prefer:
    Route::get('/payment/paystack/callback', [WebController::class, 'paystackCallback'])->name('paystack.callback');

});




Route::get('/', [WebController::class, 'index']);
Route::get('/programs', [WebController::class, 'programs']);
Route::get('get-courses', [WebController::class, 'getCourses'])->name('get-course');
Route::get('courses', [WebController::class, 'course'])->name('course');
Route::get('courses/{course}', [WebController::class, 'courseDetail'])->name('course-detail');
Route::get('disclaimer', [WebController::class, 'disclaimer'])->name('disclaimer');
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('terms-and-conditions', [WebController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('blogs', [WebController::class, 'blogs'])->name('blogs');
Route::get('blogs/{slug}', [WebController::class, 'blogDetail'])->name('blog-detail');
Route::get('contact-us', [WebController::class, 'contactUs'])->name('contact-us');
Route::post('contact-us', [WebController::class, 'contactUsStore'])->name('contact-us.store');

require __DIR__ . '/auth.php';
