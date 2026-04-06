@extends('website.app')
@section('title', 'Exam Result')
@section('main')

    <section class="min-h-screen py-10 px-5 lg:p-20 w-full bg-gray-50">

        <div class="max-w-5xl mx-auto bg-white border-2 border-[#3bcbbe] rounded-2xl shadow-lg p-10 grid md:grid-cols-2 gap-10">

            <!-- Result Summary -->
            <div>
                <h2 class="text-3xl font-bold text-[#102935] mb-6">Exam Result</h2>

                <!-- Score Badge -->
                <div class="mb-8">
                    <div
                        class="inline-flex items-center justify-center w-36 h-36 rounded-full bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white shadow-lg">
                        <div class="text-center">
                            <p class="text-sm uppercase tracking-wide">Score</p>
                            <p class="text-4xl font-bold">{{ $percentage }}%</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="p-4 border rounded-xl">
                        <p class="text-sm text-gray-500">Total Questions</p>
                        <p class="text-2xl font-bold text-[#102935]">{{ $totalQuestions }}</p>
                    </div>
                    <div class="p-4 border rounded-xl">
                        <p class="text-sm text-gray-500">Attempted</p>
                        <p class="text-2xl font-bold text-[#102935]">{{ count($attemptedQuestions) }}</p>
                    </div>
                    <div class="p-4 border rounded-xl">
                        <p class="text-sm text-gray-500">Correct</p>
                        <p class="text-2xl font-bold text-green-600">{{ $correctAnswers }}</p>
                    </div>
                    <div class="p-4 border rounded-xl">
                        <p class="text-sm text-gray-500">Accuracy</p>
                        <p class="text-2xl font-bold text-[#102935]">{{ $percentage }}%</p>
                    </div>
                </div>

                @if ($userExam->type == 'time restricted')
                    <div class="mb-6">
                        <p class="text-sm text-gray-500">Time Spent</p>
                        <p class="text-xl font-semibold text-[#102935]">{{ $userExam->time_spent ?? '—' }}</p>
                    </div>
                @endif

                <!-- Performance Message -->
                <div class="mb-10">
                    @if ($percentage >= 80)
                        <h4 class="text-2xl font-bold text-green-600">Excellent Performance</h4>
                        <p class="text-gray-600">Outstanding exam result. Keep it up.</p>
                    @elseif($percentage >= 50)
                        <h4 class="text-2xl font-bold text-yellow-600">Good Attempt</h4>
                        <p class="text-gray-600">You are close to mastery. Review weak areas.</p>
                    @else
                        <h4 class="text-2xl font-bold text-red-600">Needs Improvement</h4>
                        <p class="text-gray-600">Revisit the material and attempt again.</p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4">
                    <a href="{{ url('course/exam/' . $userExam->user_exam_id . '/result/answers') }}"
                        class="px-6 py-3 rounded-xl bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold hover:opacity-90">
                        Review Answers
                    </a>

                    <a href="{{ url('course/' . $userExam->course->slug . '/exam') }}"
                        class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-semibold text-[#102935]">
                        Try Again
                    </a>

                    <a href="{{ route('course') }}"
                        class="px-6 py-3 rounded-xl bg-gray-100 hover:bg-gray-200 font-semibold text-[#102935]">
                        Back to Course
                    </a>
                </div>
            </div>

            <!-- Illustration + Progress Ring -->
            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset('result.png') }}" class="max-w-sm mb-8" alt="Result">

                <!-- Visual Progress Ring -->
                <div class="relative w-48 h-48">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                        <path d="M18 2.0845
                           a 15.9155 15.9155 0 0 1 0 31.831
                           a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#e5e7eb" stroke-width="3" />
                        <path d="M18 2.0845
                           a 15.9155 15.9155 0 0 1 0 31.831
                           a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#3bcbbe" stroke-width="3"
                            stroke-dasharray="{{ $percentage }}, 100" />
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-4xl font-bold text-[#2bbaae]">{{ $percentage }}%</span>
                    </div>
                </div>
            </div>

        </div>


    </section>

    @push('script')
        <script>
            history.pushState(null, "", location.href);
            window.addEventListener("popstate", function() {
                alert("You cannot go backward after viewing the result.");
                history.pushState(null, "", location.href);
            });
        </script>
    @endpush

    @push('head')
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
    @endpush

@endsection
