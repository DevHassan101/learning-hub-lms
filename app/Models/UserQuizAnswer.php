<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function quizQuestion() {
        return $this->belongsTo(QuizQuestion::class);
    }
}
