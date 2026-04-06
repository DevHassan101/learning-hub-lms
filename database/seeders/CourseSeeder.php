<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\ExamQuestion;
use App\Models\QuizQuestion;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'category_id' => 1,
                'title' => 'Fundamentals of Nursing',
                'slug' => 'fundamentals-of-nursing',
                'description' => 'Learn the core principles of patient care, medical ethics, and essential nursing skills to build a strong foundation in the nursing profession.',
                'thumbnail' => 'uploads/course/thumbnails/1823947048435539.png',
            ],
            [
                'category_id' => 1,
                'title' => 'Emergency & Critical Care Nursing',
                'slug' => 'emergency-critical-care-nursing',
                'description' => 'Gain expertise in handling emergency situations, administering first aid, and providing life-saving interventions in high-pressure medical environments.',
                'thumbnail' => 'uploads/course/thumbnails/1823947071378577.png',
            ],
            [
                'category_id' => 2,
                'title' => 'Pharmacology for Nurses',
                'slug' => 'pharmacology-for-nurses',
                'description' => 'Understand medication classifications, dosages, administration techniques, and the effects of drugs on the human body to ensure patient safety.',
                'thumbnail' => 'uploads/course/thumbnails/1823947095663653.png',
            ],
            [
                'category_id' => 1,
                'title' => 'Pediatric Nursing Care',
                'slug' => 'pediatric-nursing-care',
                'description' => 'Learn how to provide specialized nursing care for infants, children, and adolescents, focusing on developmental needs and family-centered care.',
                'thumbnail' => 'uploads/course/thumbnails/1823947116363931.png',
            ],
            [
                'category_id' => 2,
                'title' => 'Mental Health & Psychiatric Nursing',
                'slug' => 'mental-health-psychiatric-nursing',
                'description' => 'Explore the role of nurses in mental health care, including patient assessment, therapeutic communication, and crisis intervention strategies.',
                'thumbnail' => 'uploads/course/thumbnails/1823947140021478.png',
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::create($courseData);

            $examQuestions = [
                [
                    'course_id' => $course->id,
                    'question' => 'What is the primary responsibility of a nurse?',
                    'answer' => 'option_b',
                    'option_a' => 'Administration',
                    'option_b' => 'Patient care',
                    'option_c' => 'Research',
                    'option_d' => 'Pharmaceutical sales',
                    'description' => 'Nurses primarily focus on providing care and support to patients.',
                ],
                [
                    'course_id' => $course->id,
                    'question' => 'Which nursing principle emphasizes patient autonomy?',
                    'answer' => 'option_a',
                    'option_a' => 'Informed consent',
                    'option_b' => 'Delegation',
                    'option_c' => 'Confidentiality',
                    'option_d' => 'Collaboration',
                    'description' => 'Informed consent ensures patients have control over their healthcare decisions.',
                ],
            ];

            foreach ($examQuestions as $question) {
                ExamQuestion::create($question);
            }

            $quizQuestions = [
                [
                    'course_id' => $course->id,
                    'question' => 'What is the normal range for adult blood pressure?',
                    'answer' => 'option_b',
                    'option_a' => '130/90 mmHg',
                    'option_b' => '120/80 mmHg',
                    'option_c' => '110/70 mmHg',
                    'option_d' => '140/100 mmHg',
                    'description' => 'The standard normal blood pressure for adults is 120/80 mmHg.',
                    'type' => 'normal',
                ],
                [
                    'course_id' => $course->id,
                    'question' => 'Which of the following is a symptom of hypoglycemia?',
                    'answer' => 'option_a',
                    'option_a' => 'Sweating',
                    'option_b' => 'High fever',
                    'option_c' => 'Dry mouth',
                    'option_d' => 'Increased thirst',
                    'description' => 'Sweating is a common symptom of low blood sugar levels.',
                    'type' => 'time restricted',
                ],
            ];

            foreach ($quizQuestions as $question) {
                QuizQuestion::create($question);
            }
        }
    }
}
