@extends('website.app')
@section('title', 'Exam')
@section('main')

<section class="py-16 px-6 lg:px-20 w-full bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-14">
            <span class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-4 px-5 py-2 bg-[#3bcbbe]/10 rounded-full">
                Final Assessment
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Start Your Exam</h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
        </div>

        <!-- Exam Card -->
        <div class="max-w-3xl mx-auto">
            <div class="group bg-white border-2 border-[#3bcbbe] rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">

                <!-- Header Area -->
                <div class="relative h-60 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex flex-col items-center justify-center text-white">
                    <iconify-icon icon="mdi:clipboard-text-outline" width="90" height="90" style="color:#fff"></iconify-icon>
                    <span class="mt-4 text-sm font-semibold tracking-wide uppercase">Certification Exam</span>
                </div>

                <!-- Content -->
                <div class="p-10">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Practice Exam</h2>
                    <p class="text-gray-700 text-lg mb-8">
                        Evaluate your mastery with a full-length practice exam. This simulates the final test environment and prepares you for real performance.
                    </p>

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-6">
                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-2 text-gray-600">
                                <iconify-icon icon="ph:question-bold" width="22" height="22"></iconify-icon>
                                <span class="text-sm font-medium">Multiple Questions</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-600">
                                <iconify-icon icon="ph:clock-bold" width="22" height="22"></iconify-icon>
                                <span class="text-sm font-medium">No Time Limit</span>
                            </div>
                        </div>

                        <!-- Action Area -->
                        @if (count($course->examQuestions) > 0)
                            <a href="{{ url('course/exam/' . $course->slug) }}"
                               class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-2xl text-white font-bold text-lg hover:shadow-xl transition">
                                Start Exam
                                <iconify-icon icon="ph:arrow-right-bold" width="22" height="22" style="color:#fff"></iconify-icon>
                            </a>
                        @else
                            <div class="px-8 py-4 bg-gray-100 rounded-xl text-gray-500 font-semibold">
                                No Exam Available
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection