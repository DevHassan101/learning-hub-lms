<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_quiz_id');
            $table->foreign('user_quiz_id')->on('user_quizzes')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('quiz_question_id');
            $table->foreign('quiz_question_id')->on('quiz_questions')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_quiz_answers');
    }
};
