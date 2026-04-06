<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Monthly',
                'price' => '10'
            ],
            [
                'name' => 'Quarterly',
                'price' => '20'
            ],
            [
                'name' => 'Annual',
                'price' => '30'
            ],
            [
                'name' => 'NCLEX & IELTS',
                'price' => '40'
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
