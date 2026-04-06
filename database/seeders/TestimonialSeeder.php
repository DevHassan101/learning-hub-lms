<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Chinedu',
                'message' => 'Before I found Clined Learning Hub, some topics were confusing for me. The explanations here are very clear and easy to understand. I now feel more confident when studying.'
            ],
            [
                'name' => 'Aisha',
                'message' => 'I like how the lessons are straight to the point. It helps me revise quickly before tests. I always recommend this site to my classmates.'
            ],
            [
                'name' => 'Samuel',
                'message' => 'This platform helped me understand topics I struggled with in class. The examples used make learning easier, especially for beginners.'
            ],
            [
                'name' => 'Blessing',
                'message' => 'Clined Learning Hub has been very helpful for my studies. I use it mostly at night when I want to read quietly. It explains things in a simple way.'
            ],
            [
                'name' => 'Ibrahim',
                'message' => 'I enjoy using this site because it doesn’t confuse me. Everything is explained in a way students can understand. It really supports my learning.'
            ],
            [
                'name' => 'Esther',
                'message' => 'The notes here are well arranged and easy to follow. It saves me time when preparing for exams. I’m glad I came across this platform.'
            ],
            [
                'name' => 'Daniel',
                'message' => 'This website makes learning less stressful. I like how the lessons are broken down step by step. It has improved how I study.'
            ],
            [
                'name' => 'Fatima',
                'message' => 'I use Clined Learning Hub for revision and practice. It has helped me understand topics faster than reading only my textbooks.'
            ],
            [
                'name' => 'Joseph',
                'message' => 'The explanations are very clear and practical. Even difficult topics become easier after reading from this site.'
            ],
            [
                'name' => 'Maryam',
                'message' => 'This platform has really helped me improve my understanding. It feels like someone is teaching you calmly, not rushing you.'
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
