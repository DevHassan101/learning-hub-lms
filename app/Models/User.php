<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->hasMany(UserCourse::class);
    }
    public function continueCourses()
    {
        return $this->hasMany(UserCourse::class)->where('status', 'active');
    }
    public function completedCourses()
    {
        return $this->hasMany(UserCourse::class)->where('status', 'completed');
    }

    public function sentNotifications()
    {
        return $this->hasMany(Notification::class, 'admin_id');
    }
    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class);
        // $subscription = UserSubscription::where('user_id', $this->id)->first();
    }
    public function activeSubscription()
    {
        return $this->hasOne(UserSubscription::class)
            ->where('status', 'active')
            ->latest()
            ->first();
    }
    public function userExams()
    {
        return $this->hasMany(UserExam::class);
    }
    public function userQuizzes()
    {
        return $this->hasMany(UserQuiz::class);
    }
    public function getUserExamAverageAttribute()
    {
        return $this->userExams()->avg('score') ?? 0;
    }
    public function getUserQuizAverageAttribute()
    {
        return $this->userExams()->avg('score') ?? 0;
    }
    public function userExamScore($courseId)
    {
        $exam = UserExam::where('course_id', $courseId)
            ->where('user_id', $this->id)
            ->first();

        return $exam ? $exam->score : null;
    }
    public function userQuizScore($courseId)
    {
        $exam = UserQuiz::where('course_id', $courseId)
            ->where('user_id', $this->id)
            ->first();

        return $exam ? $exam->score : null;
    }
}
