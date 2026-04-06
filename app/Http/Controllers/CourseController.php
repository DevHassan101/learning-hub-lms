<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\ExamQuestion;
use App\Models\Lesson;
use App\Models\QuizQuestion;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Course::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        if ($request->has('paginate')) {
            $paginate = $request->input('paginate');
        } else {
            $paginate = 10;
        }

        $courses = $query->paginate($paginate);

        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.course.table', compact('courses'))->render(),
                'pagination' => (string) $courses->links()
            ]);
        }
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:courses,title',
            'description' => 'required|min:5',
            'file' => 'required|mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ], [
            'category_id' => "Category is required"
        ]);
        $thumbnail = $request->file('file');
        $name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move('uploads/course/thumbnails/', $name_gen);
        $validatedData['thumbnail'] = 'uploads/course/thumbnails/' . $name_gen;
        $validatedData['slug'] = str_replace(' ', '-', strtolower($request->title));
        Course::create($validatedData);
        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $lessons = Lesson::where('course_id', $course->id)->get();
        return view('admin.course.show', compact('course', 'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::get();
        return view('admin.course.edit', compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:courses,title,' . $course->id,
            'description' => 'required|min:5',
            'file' => 'nullable|mimes:png,jpg,jpeg',
            'category_id' => 'required'
        ], [
            'category_id' => "category is required"
        ]);
        if ($request->file) {
            if (file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }
            $thumbnail = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/course/thumbnails/', $name_gen);
            $validatedData['thumbnail'] = 'uploads/course/thumbnails/' . $name_gen;
        } else {
            unset($validatedData['thumbnail']);
        }
        $course->update($validatedData);
        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (file_exists(public_path($course->thumbnail))) {
            unlink(public_path($course->thumbnail));
        } else {
            Log::info("File not found: " . public_path($course->thumbnail));
        }
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }

    public function addLesson(Course $course)
    {
        return view('admin.course.add-lesson', compact('course'));
    }
    public function storeLesson(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:lessons,title',
            'description' => 'required',
            'thumbnail' => 'required|mimes:jpg,png,jpeg',
            'external_link' => 'nullable|required_without_all:attachment,video|nullable',
            'video' => 'nullable|required_without_all:attachment,external_link|mimes:mp4',
            'attachment' => 'nullable|required_without_all:video,external_link|mimes:pdf',
        ], [
            'title.required' => 'The lesson title is required.',
            'title.min' => 'The lesson title must be at least 3 characters.',
            'title.unique' => 'This lesson title already exists.',

            'description.required' => 'The description is required.',
            'thumbnail.required' => 'A thumbnail image is required.',
            'thumbnail.mimes' => 'Only JPG, PNG, or JPEG files are allowed for thumbnails.',

            'external_link.required_without_all' => 'Provide an external link, video, or attachment.',
            'external_link.url' => 'The external link must be a valid URL.',

            'video.required_without_all' => 'Provide a video, external link, or attachment.',
            'video.mimes' => 'Only MP4 files are allowed for videos.',

            'attachment.required_without_all' => 'Provide an attachment, video, or external link.',
            'attachment.mimes' => 'Only PDF files are allowed for attachments.',
        ]);

        $validatedData['course_id'] = $course->id;
        $validatedData['slug'] = str_replace(' ', '-', strtolower($request->title));
        if ($request->video) {
            $video = $request->file('video');
            $name_gen = hexdec(uniqid()) . '.' . $video->getClientOriginalExtension();
            $video->move('uploads/course/lessons/video-files', $name_gen);
            $validatedData['file'] = 'uploads/course/lessons/video-files/' . $name_gen;
        }
        if ($request->thumbnail) {
            $thumbnail = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/course/lessons/thumbnails', $name_gen);
            $validatedData['thumbnail'] = 'uploads/course/lessons/thumbnails/' . $name_gen;
        }
        if ($request->attachment) {
            $attachment = $request->file('attachment');
            $name_gen = hexdec(uniqid()) . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('uploads/course/lessons/attachments', $name_gen);
            $validatedData['attachments'] = 'uploads/course/lessons/attachments/' . $name_gen;
        }
        if (!empty($validatedData['external_link'])) {
            $validatedData['external_link'] = $this->convertYoutubeLinkToEmbed($validatedData['external_link']);
        }
        Lesson::create($validatedData);
        UserCourse::where('course_id', $course->id)->update(['status' => 'active']);
        return redirect("course/$course->id")->with('success', 'Lesson created successfully.');
    }
    private function convertYoutubeLinkToEmbed($url)
    {
        $videoId = null;
    
        // Check for youtu.be short links
        if (preg_match('/youtu\.be\/([^\?\&]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
        // Check for youtube.com/watch?v= style
        elseif (preg_match('/youtube\.com.*[?&]v=([^&]+)/', $url, $matches)) {
            $videoId = $matches[1];
        }
    
        if ($videoId) {
            return 'https://www.youtube.com/embed/' . $videoId;
        }
    
        return $url; // Return original if not matched
    }
    public function editLesson(Lesson $lesson)
    {
        return view('admin.course.edit-lesson', compact('lesson'));
    }
    public function updateLesson(Request $request, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|unique:lessons,title,' . $lesson->id,
            'description' => 'required',
            'video' => 'mimes:mp4',
            'thumbnail' => 'mimes:jpg,png,jpeg',
            'attachment' => 'mimes:pdf',
            'external_link' => 'nullable',
        ]);
        if ($request->video) {
            $video = $request->file('video');
            $name_gen = hexdec(uniqid()) . '.' . $video->getClientOriginalExtension();
            $video->move('uploads/course/lessons/video-files', $name_gen);
            $validatedData['file'] = 'uploads/course/lessons/video-files/' . $name_gen;
            if ($lesson->file && file_exists(public_path($lesson->file))) {
                unlink(public_path($lesson->file));
            }
        }
        if ($request->thumbnail) {
            $thumbnail = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move('uploads/course/lessons/thumbnails', $name_gen);
            $validatedData['thumbnail'] = 'uploads/course/lessons/thumbnails/' . $name_gen;
            if ($lesson->thumbnail && file_exists(public_path($lesson->thumbnail))) {
                unlink(public_path($lesson->thumbnail));
            }
        }
        if ($request->attachment) {
            $attachment = $request->file('attachment');
            $name_gen = hexdec(uniqid()) . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('uploads/course/lessons/attachments', $name_gen);
            $validatedData['attachments'] = 'uploads/course/lessons/attachments/' . $name_gen;
            if ($lesson->attachments && file_exists(public_path($lesson->attachments))) {
                unlink(public_path($lesson->attachments));
            }
        }
        // if (!empty($validatedData['external_link'])) {
        //     $validatedData['external_link'] = $this->convertYoutubeLinkToEmbed($validatedData['external_link']);
        // }
        $lesson->update($validatedData);
        return redirect("course/$lesson->course_id")->with('success', 'Lesson updated successfully.');
    }
    public function deleteLesson($lesson)
    {
        $lesson = Lesson::findOrFail($lesson);
        $courseId = $lesson->course_id;
        if ($lesson->attachments && file_exists(public_path($lesson->attachments))) {
            unlink(public_path($lesson->attachments));
        }
        if ($lesson->thumbnail && file_exists(public_path($lesson->thumbnail))) {
            unlink(public_path($lesson->thumbnail));
        }
        if ($lesson->file && file_exists(public_path($lesson->file))) {
            unlink(public_path($lesson->file));
        }
        $lesson->delete();
        return redirect("course/$courseId")->with('success', 'Lesson deleted successfully.');
    }


    public function manageExam(Course $course)
    {
        $exams = ExamQuestion::where('course_id', $course->id)->paginate(10);
        return view('admin.course.manage-exam', compact('course', 'exams'));
    }
    public function addExam(Course $course)
    {
        return view('admin.course.add-exam', compact('course'));
    }
    public function storeExam(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:3',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'description' => 'required'
        ]);
        $validatedData['course_id'] = $course->id;
        ExamQuestion::create($validatedData);
        return redirect("course/$course->id/manage-exam")->with('success', 'Exam created successfully.');
    }
    public function editExam(ExamQuestion $exam)
    {
        return view('admin.course.edit-exam', compact('exam'));
    }
    public function updateExam(Request $request, ExamQuestion $exam)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:3',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'description' => 'required'
        ]);
        $exam->update($validatedData);
        return redirect("course/$exam->course_id/manage-exam")->with('success', 'Exam updated successfully.');
    }
    public function deleteExam($exam)
    {
        $exam = ExamQuestion::findOrFail($exam);
        $courseId = $exam->course_id;
        $exam->delete();
        return redirect("course/$courseId/manage-exam")->with('success', 'Exam deleted successfully.');
    }
    public function manageQuiz(Course $course)
    {
        $timeRestrictedQuiz = QuizQuestion::where('course_id', $course->id)->where('type', 'time restricted')->whereNull('lesson_id')->paginate(10);
        $normalQuiz = QuizQuestion::where('course_id', $course->id)->where('type', 'normal')->whereNull('lesson_id')->paginate(10);
        return view('admin.course.manage-quiz', compact('course', 'timeRestrictedQuiz', 'normalQuiz'));
    }
    public function manageLessonQuiz(Course $course, Lesson $lesson)
    {
        $timeRestrictedQuiz = QuizQuestion::where('course_id', $course->id)->where('lesson_id', $lesson->id)->where('type', 'time restricted')->paginate(10);
        $normalQuiz = QuizQuestion::where('course_id', $course->id)->where('lesson_id', $lesson->id)->where('type', 'normal')->paginate(10);
        return view('admin.course.manage-lesson-quiz', compact('course', 'timeRestrictedQuiz', 'normalQuiz','lesson'));
    }
    public function addQuiz(Course $course)
    {
        return view('admin.course.add-quiz', compact('course'));
    }
    public function addLessonQuiz(Course $course, Lesson $lesson)
    {
        return view('admin.course.add-lesson-quiz', compact('course','lesson'));
    }
    public function storeQuiz(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:3',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $validatedData['course_id'] = $course->id;
        QuizQuestion::create($validatedData);
        return redirect("course/$course->id/manage-quiz")->with('success', 'Quiz created successfully.');
    }
    public function storeLessonQuiz(Request $request, Course $course, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:3',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $validatedData['course_id'] = $course->id;
        $validatedData['lesson_id'] = $lesson->id;
        QuizQuestion::create($validatedData);
        return redirect("course/$course->id/$lesson->id/manage-lesson-quiz")->with('success', 'Quiz created successfully.');
    }
    public function editQuiz(QuizQuestion $quiz)
    {
        return view('admin.course.edit-quiz', compact('quiz'));
    }
    public function updateQuiz(Request $request, QuizQuestion $quiz)
    {
        $validatedData = $request->validate([
            'question' => 'required|min:3',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);
        $quiz->update($validatedData);
        return redirect("course/$quiz->course_id/manage-quiz")->with('success', 'Quiz updated successfully.');
    }
    public function deleteQuiz($quiz)
    {
        $quiz = QuizQuestion::findOrFail($quiz);
        $courseId = $quiz->course_id;
        $quiz->delete();
        return redirect("course/$courseId/manage-quiz")->with('success', 'Quiz deleted successfully.');
    }

    public function updateTimer(Request $request, Course $course)
    {
        $request->validate([
            'quiz_duration' => 'required'
        ]);
        $course->update([
            'quiz_duration' => $request->quiz_duration
        ]);
        return redirect("course/$course->id/manage-quiz")->with('success', 'Quiz time updated successfully.');
    }
    public function updateLessonTimer(Request $request, Lesson $lesson)
    {
        $request->validate([
            'quiz_duration' => 'required'
        ]);
        $lesson->update([
            'quiz_duration' => $request->quiz_duration
        ]);
        return redirect("course/$lesson->course_id/$lesson->id/manage-lesson-quiz")->with('success', 'Quiz time updated successfully.');
    }
}
