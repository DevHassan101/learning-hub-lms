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
        Schema::create('dynamic_content_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dynamic_content_id');
            $table->foreign('dynamic_content_id')->references('id')->on('dynamic_contents')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->longText('content');
            $table->enum('type', ['rich-text', 'text', 'image'])->default('rich-text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_content_fields');
    }
};
