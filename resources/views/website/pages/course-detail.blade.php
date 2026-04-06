@extends('website.app')
@section('title', 'Course Detail')
@section('main')

    <!-- Hero Section with Modern Design -->
    <section class="relative min-h-[450px] py-16 px-24 lg:px-20 w-full overflow-hidden">
        <div class="relative w-full p-10 border-2 border-[#3bcbbe] rounded-3xl bg-gray-50">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <!-- Category Badge -->
                    <div class="mb-6">
                        <span
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#28c4b7] backdrop-blur-sm 
                            rounded-full text-white text-[16px] font-medium shadow-sm">
                            <iconify-icon icon="mingcute:department-fill" width="18" height="18"
                                style="color: #fff"></iconify-icon>
                            Department: {{ $course->category->title ?? 'General' }}
                        </span>
                    </div>

                    <!-- Course Title -->
                    <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold text-black mb-5">
                        {{ $course->title }}
                    </h1>

                    <!-- Course Description -->
                    <p class="text-lg md:text-xl text-black/70 mb-8 leading-relaxed">
                        {{ $course->description }}
                    </p>

                    <!-- Course Stats -->
                    <div class="flex flex-wrap items-center gap-8 mb-10">
                        <div
                            class="flex items-center gap-3 border border-[#3bcbbe] bg-white/10 backdrop-blur-sm px-4 py-3 rounded-lg">
                            <iconify-icon icon="si:book-line" width="24" height="24"
                                style="color: #3bcbbe"></iconify-icon>
                            <div>
                                <div class="text-black font-semibold text-lg">{{ count($course->lessons) }}</div>
                                <div class="text-black/70 text-sm">Lessons</div>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-3 border border-[#3bcbbe]  bg-white/10 backdrop-blur-sm px-4 py-3 rounded-lg">
                            <iconify-icon icon="lucide:clock" width="24" height="24"
                                style="color: #3bcbbe"></iconify-icon>
                            <div>
                                <div class="text-black font-semibold text-lg">Self-Paced</div>
                                <div class="text-black/70 text-sm">Learning</div>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-3 border border-[#3bcbbe] bg-white/10 backdrop-blur-sm px-4 py-3 rounded-lg">
                            <iconify-icon icon="stash:users-crown" width="24" height="24"
                                style="color: #3bcbbe"></iconify-icon>
                            <div>
                                <div class="text-black font-semibold text-lg">Expert</div>
                                <div class="text-black/70 text-sm">Instructors</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Enroll Card -->
                <div class="lg:flex lg:justify-end">
                    <div class="bg-white rounded-3xl shadow-sm p-8 max-w-md w-full border-2 border-[#3bcbbe]">
                        <div class="text-center mb-6">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                                <iconify-icon icon="solar:diploma-verified-bold" width="44" height="44"
                                    style="color: #fff"></iconify-icon>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                @if ($userEnrolledInCourse)
                                    You're Enrolled!
                                @else
                                    Enroll Now
                                @endif
                            </h3>
                            <p class="text-gray-600">
                                @if ($userEnrolledInCourse)
                                    Continue your learning journey
                                @else
                                    Start your learning journey today
                                @endif
                            </p>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex items-center gap-3 text-gray-700">
                                <iconify-icon icon="lets-icons:check-fill" width="22" height="22"
                                    style="color: #3bcbbe"></iconify-icon>
                                <span>Lifetime access to course materials</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <iconify-icon icon="lets-icons:check-fill" width="22" height="22"
                                    style="color: #3bcbbe"></iconify-icon>
                                <span>Certificate of completion</span>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <iconify-icon icon="lets-icons:check-fill" width="22" height="22"
                                    style="color: #3bcbbe"></iconify-icon>
                                <span>Expert instructor support</span>
                            </div>
                        </div>

                        @if ($userEnrolledInCourse)
                            <button
                                class="w-full flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#2fc3b7] rounded-xl text-white text-lg font-bold hover:shadow-2xl hover:shadow-[#3bcbbe]/40 transform hover:-translate-y-1 transition-all duration-300">
                                <iconify-icon icon="icon-park-solid:check-one" width="22" height="22"
                                    style="color: #fff"></iconify-icon>
                                Continue Learning
                            </button>
                        @else
                            <a href="{{ route('course-enroll', ['course' => $course->slug]) }}"
                                class="w-full flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-br from-[#3bcbbe] to-[#2fc3b7] rounded-xl text-white text-lg font-bold hover:shadow-2xl hover:shadow-[#3bcbbe]/40 transform hover:-translate-y-1 transition-all duration-300">
                                <iconify-icon icon="material-symbols:rocket-launch" width="22" height="22"
                                    style="color: #fff"></iconify-icon>
                                Enroll Now
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Curriculum Section -->
    <section class="pt-4 px-5 lg:px-20 w-full bg-white mb-20">
        <div class="max-w-[83rem] mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-4 px-5 py-2 bg-[#3bcbbe]/10 rounded-full">
                    What You'll Learn
                </span>
                <h2 class="text-4xl md:text-5xl lg:text-5xl text-gray-900 font-bold mb-4">
                    Course Curriculum
                </h2>
                <div class="w-28 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
            </div>

            <!-- Lessons Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @forelse ($course->lessons as $index => $lesson)
                    @php
                        $url =
                            is_null($lesson->file) && is_null($lesson->external_link)
                                ? 'course/' . $course->slug . '/' . $lesson->slug . '/lectures-pdf'
                                : 'course/' . $course->slug . '/' . $lesson->slug;
                    @endphp
                    <a href="{{ url($url) }}" target="{{ is_null($lesson->file) ? '_blank' : '' }}"
                        class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border-2 border-[#3bcbbe] hover:border-[#3bcbbe] transform hover:-translate-y-2">
                        <!-- Lesson Image -->
                        <div
                            class="relative h-[18rem] overflow-hidden border-b border-[#3bcbbe]/60 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1]">
                            @if (is_null($lesson->file) && is_null($lesson->external_link))
                                <div class="w-full h-full flex items-center justify-center">
                                    <iconify-icon icon="fluent:document-48-filled" width="80" height="80"
                                        style="color: #fff"></iconify-icon>
                                </div>
                            @else
                                <img src="{{ asset($lesson->thumbnail) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    alt="{{ $lesson->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"> </div>
                            @endif
                            <!-- Lesson Number Badge -->
                            <div
                                class="absolute top-0 left-4 w-8 h-12 bg-white border-l border-r border-b border-[#3bcbbe] rounded-b-full flex items-center justify-center shadow-md">
                                <span class="text-[#3bcbbe] font-bold text-lg">0{{ $index + 1 }}</span>
                            </div>
                        </div>

                        <!-- Lesson Content -->
                        <div class="px-6 py-4">
                            <h3 class="text-sm bg-[#26c7b9d7] w-34 py-1.5 px-7 rounded-r-full absolute left-0 font-medium tracking-wide text-white transition-colors ">
                                Lesson No: {{ $index + 1 }}
                            </h3>
                            <h3
                                class="text-xl font-semibold text-gray-900 mt-12 mb-2 group-hover:text-[#3bcbbe] transition-colors max-w-[20rem]">
                                {{ $lesson->title }}
                            </h3>
                            <p class="text-sm font-semibold tracking-wide text-[#3bcbbe] mb-2">By Sir, William Doe</p>
                            <p class="text-gray-800 text-md text-justify line-clamp-4 mb-4">
                                {{ $lesson->description }}
                            </p>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

                            <div class="flex justify-center items-center rounded-xl bg-gradient-to-t from-[#3bcbbe] to-[#29c5b8] w-[10rem] px-5 py-3.5 mb-2">
                                <span class="text-white font-semibold text-[16px] mr-2">View Here</span>
                                <iconify-icon icon="humbleicons:arrow-right" width="21" height="21"  style="color: #fff"></iconify-icon>
                            </div>
                        </div>
                    </a>

                    <!-- Practice Lesson Quiz Card -->
                    @if ($lesson->quizQuestions->count() > 0)
                        <a href="{{ url('course/' . $course->slug . '/' . $lesson->slug . '/quiz') }}"
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-transparent hover:border-purple-500 transform hover:-translate-y-2">
                            <div class="relative h-48 overflow-hidden bg-gradient-to-br from-purple-500 to-purple-600">
                                <div class="w-full h-full flex items-center justify-center">
                                    <iconify-icon icon="fluent:quiz-new-28-filled" width="80" height="80"
                                        style="color: #fff"></iconify-icon>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                                    Lesson {{ $index + 1 }} Quiz
                                </h3>
                                <p class="text-gray-700 text-sm mb-4">
                                    Test your understanding of this lesson's key concepts
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-purple-600 font-semibold text-sm">Take Quiz →</span>
                                    <iconify-icon icon="ph:arrow-right-bold" width="20" height="20"
                                        style="color: #a855f7"
                                        class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                                </div>
                            </div>
                        </a>
                    @endif
                @empty
                    <div class="col-span-full text-center py-20">
                        <iconify-icon icon="solar:book-minimalistic-broken" width="100" height="100"
                            style="color: #d1d5db" class="mx-auto mb-4"></iconify-icon>
                        <p class="text-gray-500 font-medium text-xl">No lessons available yet</p>
                    </div>
                @endforelse
            </div>

            <!-- Practice Tools Section -->
            <div class="mt-16">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 text-center">Practice & Assessment Tools</h3>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Flash Card -->
                    <div onclick="flashCard()"
                        class="cursor-pointer group bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <iconify-icon icon="material-symbols-light:cards-stack" width="48" height="48"
                                style="color: #fff"></iconify-icon>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3">Flash Cards</h4>
                        <p class="text-white/90 mb-6">Review key concepts with interactive flashcards</p>
                        <div class="inline-flex items-center gap-2 text-white font-semibold">
                            <span>Start Review</span>
                            <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" style="color: #fff"
                                class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </div>
                    </div>

                    <!-- Practice Quiz -->
                    <a href="{{ url('course/' . $course->slug . '/quiz') }}"
                        class="group bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <iconify-icon icon="hugeicons:quiz-03" width="48" height="48"
                                style="color: #fff"></iconify-icon>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3">Practice Quiz</h4>
                        <p class="text-white/90 mb-6">Test your overall course understanding</p>
                        <div class="inline-flex items-center gap-2 text-white font-semibold">
                            <span>Take Quiz</span>
                            <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" style="color: #fff"
                                class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </div>
                    </a>

                    <!-- Practice Exam -->
                    <a href="{{ url('course/' . $course->slug . '/exam') }}"
                        class="group bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-8 text-center">
                        <div
                            class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <iconify-icon icon="healthicons:i-exam-multiple-choice" width="48" height="48"
                                style="color: #fff"></iconify-icon>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-3">Practice Exam</h4>
                        <p class="text-white/90 mb-6">Comprehensive final assessment</p>
                        <div class="inline-flex items-center gap-2 text-white font-semibold">
                            <span>Start Exam</span>
                            <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" style="color: #fff"
                                class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Flashcard Modal -->
    <div class="explanation-modal hidden fixed inset-0 bg-black/70 backdrop-blur-md flex items-center justify-center p-4 z-50"
        id="flashcard-modal">
        <div class="modal-content bg-white rounded-3xl shadow-2xl max-w-4xl w-full relative overflow-hidden">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-2xl px-8 py-6 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                        <iconify-icon icon="material-symbols-light:cards-stack" width="28" height="28"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <h2 class="text-3xl font-bold text-white">Flash Cards</h2>
                </div>
                <button onclick="cancelFlashcard()"
                    class="w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center transition-all">
                    <iconify-icon icon="material-symbols:close" width="24" height="24"
                        style="color: #fff"></iconify-icon>
                </button>
            </div>

            <!-- Flash Card Container -->
            <div class="p-8 md:p-12">
                <div id="flashCardContainer">
                    @forelse ($course->flashCards as $index => $flashCard)
                        <div class="flash-card hidden" data-index="{{ $index }}">
                            <div class="relative">
                                <!-- Card Design -->
                                <div
                                    class="bg-gradient-to-br from-[#3bcbbe]/5 to-[#26beb1]/10 rounded-3xl p-10 min-h-[320px] border-2 border-[#3bcbbe]/20 shadow-inner">
                                    <div class="absolute top-6 right-6 text-[#3bcbbe] font-bold text-lg">
                                        Card {{ $index + 1 }} / {{ count($course->flashCards) }}
                                    </div>
                                    <div class="mt-8">
                                        <div class="inline-block px-4 py-2 bg-[#3bcbbe]/10 rounded-lg mb-6">
                                            <span
                                                class="text-[#3bcbbe] font-semibold text-sm uppercase tracking-wide">Question</span>
                                        </div>
                                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                                            {{ $flashCard->title }}
                                        </h3>
                                        <div class="inline-block px-4 py-2 bg-[#26beb1]/10 rounded-lg mb-4">
                                            <span
                                                class="text-[#26beb1] font-semibold text-sm uppercase tracking-wide">Answer</span>
                                        </div>
                                        <p
                                            class="text-lg text-gray-700 leading-relaxed max-h-[160px] overflow-y-auto pr-4 custom-scrollbar">
                                            {{ $flashCard->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16">
                            <iconify-icon icon="solar:card-broken" width="80" height="80" style="color: #d1d5db"
                                class="mx-auto mb-4"></iconify-icon>
                            <p class="text-gray-500 font-medium text-lg">No Flashcards Available</p>
                        </div>
                    @endforelse
                </div>

                <!-- Navigation Controls -->
                @if (count($course->flashCards) > 0)
                    <div class="mt-10 flex items-center justify-between">
                        <button id="prevBtn"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-xl text-white text-lg font-bold hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all transform hover:-translate-x-1">
                            <iconify-icon icon="ph:caret-left-bold" width="24" height="24"
                                style="color: #fff"></iconify-icon>
                            Previous
                        </button>

                        <div class="flex gap-3">
                            @foreach ($course->flashCards as $index => $flashCard)
                                <div class="dot-indicator w-3 h-3 rounded-full bg-gray-300 transition-all cursor-pointer hover:scale-125"
                                    data-dot="{{ $index }}" onclick="jumpToCard({{ $index }})"></div>
                            @endforeach
                        </div>

                        <button id="nextBtn"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-xl text-white text-lg font-bold hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all transform hover:translate-x-1">
                            Next
                            <iconify-icon icon="ph:caret-right-bold" width="24" height="24"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('script')
        <script>
            let currentIndex = 0;

            function flashCard() {
                document.getElementById('flashcard-modal').classList.remove('hidden');
            }

            function cancelFlashcard() {
                document.getElementById('flashcard-modal').classList.add('hidden');
            }

            function jumpToCard(index) {
                currentIndex = index;
                showFlashCard(currentIndex);
            }

            document.addEventListener("DOMContentLoaded", function() {
                let flashCards = document.querySelectorAll(".flash-card");
                let dots = document.querySelectorAll(".dot-indicator");

                function showFlashCard(index) {
                    flashCards.forEach((card, i) => {
                        card.classList.toggle("hidden", i !== index);
                    });

                    // Update dots
                    dots.forEach((dot, i) => {
                        if (i === index) {
                            dot.classList.remove('bg-gray-300', 'w-3', 'h-3');
                            dot.classList.add('bg-[#3bcbbe]', 'w-12', 'h-3');
                        } else {
                            dot.classList.remove('bg-[#3bcbbe]', 'w-12');
                            dot.classList.add('bg-gray-300', 'w-3', 'h-3');
                        }
                    });
                }

                if (flashCards.length > 0) {
                    document.getElementById("prevBtn").addEventListener("click", function() {
                        currentIndex = (currentIndex - 1 + flashCards.length) % flashCards.length;
                        showFlashCard(currentIndex);
                    });

                    document.getElementById("nextBtn").addEventListener("click", function() {
                        currentIndex = (currentIndex + 1) % flashCards.length;
                        showFlashCard(currentIndex);
                    });

                    // Show the first flashcard initially
                    showFlashCard(currentIndex);
                }
            });
        </script>

        <style>
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #3bcbbe;
                border-radius: 10px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #26beb1;
            }
        </style>
    @endpush
@endsection
