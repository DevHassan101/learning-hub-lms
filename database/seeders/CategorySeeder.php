<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plan;
use App\Models\PlanPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Nursing',
                'banner' => 'category/nursing.webp'
            ],
            [
                'title' => 'Midwifery',
                'banner' => 'category/midwifery.jpg'
            ],
            [
                'title' => 'NCLEX & IELTS',
                'banner' => 'category/nclex-ielts.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $plans = [
            [
                'category_id' => 1,
                'name' => "Monthly",
                'price' => 5,
            ],
            [
                'category_id' => 1,
                'name' => "Quarterly",
                'price' => 10,
            ],
            [
                'category_id' => 1,
                'name' => "Yearly",
                'price' => 15,
            ],
            [
                'category_id' => 1,
                'name' => "All time",
                'price' => 50,
            ],
            [
                'category_id' => 2,
                'name' => "Monthly",
                'price' => 10,
            ],
            [
                'category_id' => 2,
                'name' => "Quarterly",
                'price' => 20,
            ],
            [
                'category_id' => 2,
                'name' => "Yearly",
                'price' => 30,
            ],
            [
                'category_id' => 2,
                'name' => "All time",
                'price' => 100,
            ],
            [
                'category_id' => 3,
                'name' => "NCLEX & IELTS",
                'price' => 150,
            ],
        ];
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
        $planPoints = [
            ['plan_id' => 1, 'point' => 'Access to basic nursing courses'],
            ['plan_id' => 1, 'point' => 'Monthly updates on new content'],
            ['plan_id' => 1, 'point' => 'Community support'],
            ['plan_id' => 1, 'point' => 'Certification upon completion'],
            ['plan_id' => 1, 'point' => 'Mobile access to courses'],

            ['plan_id' => 2, 'point' => 'All Monthly benefits'],
            ['plan_id' => 2, 'point' => 'Exclusive webinars with experts'],
            ['plan_id' => 2, 'point' => 'Priority support'],
            ['plan_id' => 2, 'point' => 'Discounts on future courses'],
            ['plan_id' => 2, 'point' => 'Downloadable resources'],

            ['plan_id' => 3, 'point' => 'All Quarterly benefits'],
            ['plan_id' => 3, 'point' => 'Access to premium courses'],
            ['plan_id' => 3, 'point' => '1-on-1 mentorship sessions'],
            ['plan_id' => 3, 'point' => 'Offline mode for content'],
            ['plan_id' => 3, 'point' => 'Extended certification validity'],

            ['plan_id' => 4, 'point' => 'Lifetime access to all courses'],
            ['plan_id' => 4, 'point' => 'Exclusive research papers'],
            ['plan_id' => 4, 'point' => 'VIP support'],
            ['plan_id' => 4, 'point' => 'Personalized learning path'],
            ['plan_id' => 4, 'point' => 'Special networking events'],

            ['plan_id' => 5, 'point' => 'Basic midwifery courses'],
            ['plan_id' => 5, 'point' => 'Monthly updates on new content'],
            ['plan_id' => 5, 'point' => 'Community support'],
            ['plan_id' => 5, 'point' => 'Certification upon completion'],
            ['plan_id' => 5, 'point' => 'Mobile access to courses'],

            ['plan_id' => 6, 'point' => 'All Monthly benefits'],
            ['plan_id' => 6, 'point' => 'Exclusive webinars with experts'],
            ['plan_id' => 6, 'point' => 'Priority support'],
            ['plan_id' => 6, 'point' => 'Discounts on future courses'],
            ['plan_id' => 6, 'point' => 'Downloadable resources'],

            ['plan_id' => 7, 'point' => 'All Quarterly benefits'],
            ['plan_id' => 7, 'point' => 'Access to premium courses'],
            ['plan_id' => 7, 'point' => '1-on-1 mentorship sessions'],
            ['plan_id' => 7, 'point' => 'Offline mode for content'],
            ['plan_id' => 7, 'point' => 'Extended certification validity'],

            ['plan_id' => 8, 'point' => 'Lifetime access to all courses'],
            ['plan_id' => 8, 'point' => 'Exclusive research papers'],
            ['plan_id' => 8, 'point' => 'VIP support'],
            ['plan_id' => 8, 'point' => 'Personalized learning path'],
            ['plan_id' => 8, 'point' => 'Special networking events'],

            
            ['plan_id' => 9, 'point' => 'Lifetime access to all courses'],
            ['plan_id' => 9, 'point' => '1-on-1 mentorship sessions'],
            ['plan_id' => 9, 'point' => 'VIP support'],
            ['plan_id' => 9, 'point' => 'Mobile access to courses'],
            ['plan_id' => 9, 'point' => '1-on-1 mentorship sessions'],
        ];

        foreach ($planPoints as $point) {
            PlanPoint::create($point);
        }
    }
}
