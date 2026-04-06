<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function lessons() {
        return $this->hasMany(Lesson::class, 'course_id');
    }
    public function examQuestions() {
        return $this->hasMany(ExamQuestion::class);
    }
    public function quizQuestions() {
        return $this->hasMany(QuizQuestion::class);
    }
    public function flashCards() {
        return $this->hasMany(FlashCard::class);
    }

    public function timerQuizes() {
        return $this->hasMany(QuizQuestion::class)->where('type','time restricted');
    }
    public function normalQuizes() {
        return $this->hasMany(QuizQuestion::class)->where('type','normal');
    }

    public function enrollments() {
        return $this->hasMany(UserCourse::class);
    }
    public function userQuizzes() {
        return $this->hasMany(UserQuiz::class);
    }
    public function getUserQuizSumAttribute()
    {
        return $this->userQuizzes()->sum('score');
    }
    public function getUserQuizAverageAttribute()
    {
        return $this->userQuizzes()->avg('score') ?? 0;
    }
    public function userExams() {
        return $this->hasMany(UserExam::class);
    }
    public function getUserExamAverageAttribute()
    {
        return $this->userExams()->avg('score') ?? 0;
    }
}
