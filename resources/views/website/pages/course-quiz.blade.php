@extends('website.app')
@section('title', 'Select Quiz')
@section('main')

<section class="py-16 px-6 lg:px-20 w-full bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-14">
            <span class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-4 px-5 py-2 bg-[#3bcbbe]/10 rounded-full">
                Assessment
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Select Your Quiz Mode</h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
        </div>

        <!-- Quiz Cards Grid -->
        <div class="grid md:grid-cols-2 gap-10">

            <!-- Normal Quiz Card -->
            <div class="group bg-white border-2 border-[#3bcbbe] rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="relative h-56 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex items-center justify-center">
                    <iconify-icon icon="hugeicons:quiz-03" width="90" height="90" style="color:#fff"></iconify-icon>
                </div>

                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Normal Quiz</h2>
                    <p class="text-gray-700 mb-6">
                        Test your understanding with a standard untimed quiz. Ideal for revision and self‑assessment.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-[#3bcbbe]">Practice Mode</span>

                        @if (count($course->normalQuizes) > 0)
                            <a href="{{ url('course/quiz/' . $slug . '/normal') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-xl text-white font-bold hover:shadow-xl transition">
                                Start Now
                                <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" style="color:#fff"></iconify-icon>
                            </a>
                        @else
                            <span class="text-gray-500 font-medium">No Quiz Available</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Timer Quiz Card -->
            <div class="group bg-white border-2 border-[#3bcbbe] rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="relative h-56 bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center">
                    <iconify-icon icon="solar:stopwatch-bold" width="90" height="90" style="color:#fff"></iconify-icon>
                </div>

                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Timer Quiz</h2>
                    <p class="text-gray-700 mb-6">
                        Challenge yourself under time pressure. Perfect for exam‑style preparation and performance testing.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-orange-600">Time Restricted</span>

                        @if (count($course->timerQuizes) > 0)
                            @if ($course->quiz_duration == 0)
                                <span class="text-red-500 font-medium">Duration Not Set</span>
                            @else
                                <a href="{{ url('course/quiz/' . $slug . '/time-restricted') }}"
                                   class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl text-white font-bold hover:shadow-xl transition">
                                    Start Now
                                    <iconify-icon icon="ph:timer-bold" width="20" height="20" style="color:#fff"></iconify-icon>
                                </a>
                            @endif
                        @else
                            <span class="text-gray-500 font-medium">No Quiz Available</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
