<?php

namespace Database\Seeders;

use App\Models\DynamicContent;
use App\Models\DynamicContentFields;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DynamicContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Home',
                'slug' => '/',
                'fields' => [
                    [
                        'title' => 'Home Banner Text 1',
                        'content' => '<p class="text-[20px] sm:text-[24px]">Welcome to ClinEd Learning Hub</p>',
                    ],
                    [
                        'title' => 'Home Banner Text 2',
                        'content' => '<div class="mt-5 mb-10 sm:my-0"><h1 class="uppercase text-[25px] sm:text-[35px] lg:text-[45px] font-medium">the leading learning</h1><h1 class="uppercase text-[25px] sm:text-[35px] lg:text-[45px] font-medium">platform for healthcare</h1><h1 class="uppercase text-[25px] sm:text-[35px] lg:text-[45px] font-medium mb-5">students and professionals.</h1></div>',
                    ],
                    [
                        'title' => 'Image',
                        'content' => '/medical.png',
                        'type' => 'image',
                    ],
                ]
            ],
            [
                'name' => 'About us',
                'slug' => '/about-us',
                'fields' => [
                    [
                        'title' => 'Section 1',
                        'content' => '<p class="text-center text-lg mt-4">
                    Empowering Healthcare Students, Professionals and Transforming Careers.
                    At Clined Learning Hub, we don’t just teach—we equip, inspire, and elevate.
                </p><p class="text-center text-lg">
                    Whether you\'re a student preparing for exams, a healthcare professional looking to upskill, or an
                    employer aiming to boost workforce productivity, we provide cutting-edge, expert-led courses tailored to
                    your success.
                </p>
                ',
                    ],
                    [
                        'title' => 'Section 2',
                        'content' => '<p class="text-center text-xl sm:text-2xl md:text-3xl font-bold mt-10">
            Our platform is designed to meet the evolving demands of the healthcare industry by offering
        </p>
        <ul class="my-5 list-disc px-5">
            <li class="text-sm lg:text-xl py-2"> High-impact courses for students and professionals across various healthcare fields
            </li>
            <li class="text-sm lg:text-xl py-2">Flexible, self-paced learning that fits your schedule—anytime, anywhere</li>
            <li class="text-sm lg:text-xl py-2">Real-world insights from top healthcare educators and industry leaders</li>
            <li class="text-sm lg:text-xl py-2">Custom workforce training solutions for organizations seeking to enhance staff
                performance</li>
        </ul>
        <p class="text-sm lg:text-lg font-semibold">
            With our growing catalog of specialized courses, we make learning practical, engaging, and career-focused. Our
            mission is simple: to bridge the gap between education and professional excellence, ensuring that healthcare
            providers are equipped with the skills and confidence to thrive.
        </p>',
                    ],
                ]
            ],
            [
                'name' => 'Contact us',
                'slug' => '/contact-us',
                'fields' => [
                    [
                        'title' => 'Tagline',
                        'content' => '<p class="m-auto text-center xl:max-w-[80%] mt-3">
                We’d love to hear from you! Whether you have questions about our courses, need support, or want to
                collaborate, we’re here to help.
            </p>',
                        'type' => 'rich-text'
                    ],
                    [
                        'title' => 'email',
                        'content' => 'admin@clinedlearninghub.net',
                        'type' => 'text'
                    ],
                    [
                        'title' => 'whatsapp',
                        'content' => '2348167506755',
                        'type' => 'text'
                    ]
                ]
            ],
        ];

        foreach ($pages as $page) {
            $dynamicContent = DynamicContent::create([
                'page' => $page['name'],
                'url' => $page['slug']
            ]);
            foreach ($page['fields'] as $field) {
                DynamicContentFields::create([
                    'dynamic_content_id' => $dynamicContent->id,
                    'title' => $field['title'],
                    'content' => $field['content'],
                    'type' => $field['type'] ?? 'rich-text'
                ]);
            }
        }
    }
}
