@extends('website.app')
@section('title', 'Lectures')
@section('main')

    <!-- Lecture Hero Section -->
    <section class="relative py-10 px-5 lg:px-20 w-full">
        <div class="max-w-[83rem] mx-auto">
            <!-- Breadcrumb -->
            <div class="mb-6 flex items-center gap-2 text-sm">
                <a href="{{ url('courses') }}" class="text-[#3bcbbe] hover:underline font-medium">Courses</a>
                <iconify-icon icon="ph:caret-right-bold" width="16" height="16" style="color: #3bcbbe"></iconify-icon>
                <a href="{{ route('course-detail', $course->slug) }}" class="text-[#3bcbbe] hover:underline font-medium">{{ $course->title }}</a>
                <iconify-icon icon="ph:caret-right-bold" width="16" height="16" style="color: #3bcbbe"></iconify-icon>
                <span class="text-gray-600 font-medium">{{ $lecture->title }}</span>
            </div>

            <!-- Main Content Grid -->
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left Column - Video Player -->
                <div class="lg:col-span-2">
                    <!-- Video Card -->
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden border-2 border-[#3bcbbe] mb-6">
                        <!-- Video Player -->
                        <div class="relative bg-black aspect-video">
                            @if ($lecture->external_link)
                                <iframe class="w-full h-full" src="{{ $lecture->external_link }}" 
                                    title="Lecture video player" frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>
                            @else
                                <video src="{{ asset($lecture->file) }}" id="video-lecture" 
                                    controlsList="nodownload" controls 
                                    class="w-full h-full object-contain">
                                </video>
                            @endif
                        </div>

                        <!-- Lecture Info -->
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex-1">
                                    <div class="mb-4">
                                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-[#3bcbbe]/10 rounded-full text-[#3bcbbe] text-sm font-semibold">
                                            <iconify-icon icon="solar:play-circle-bold" width="18" height="18"></iconify-icon>
                                            Current Lesson
                                        </span>
                                    </div>
                                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                                        {{ $lecture->title }}
                                    </h1>
                                    <p class="text-lg text-gray-700 mb-4">
                                        {{ $lecture->description }}
                                    </p>
                                    <div class="flex items-center gap-2 text-gray-600">
                                        <iconify-icon icon="ph:user-circle-fill" width="24" height="24" style="color: #3bcbbe"></iconify-icon>
                                        <span class="font-semibold">By Sir, William Doe</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Attachment Button -->
                            @if ($lecture->attachments)
                                <div class="border-t border-gray-200 pt-6">
                                    <a href="{{ asset($lecture->attachments) }}" target="_blank"
                                        class="inline-flex items-center gap-3 px-6 py-3.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-xl text-white font-bold hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all transform hover:-translate-y-1">
                                        <iconify-icon icon="solar:download-bold" width="22" height="22" style="color: #fff"></iconify-icon>
                                        Download Attachments
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Course Lessons List -->
                    <div class="bg-white rounded-3xl shadow-lg border-2 border-[#3bcbbe] p-6">
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Course Lessons</h2>
                            <div class="w-20 h-1 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-full"></div>
                        </div>

                        <div class="space-y-4">
                            @forelse ($course->lessons as $index => $lesson)
                                @php
                                    $url = is_null($lesson->file) && is_null($lesson->external_link)
                                        ? 'course/' . $course->slug . '/' . $lesson->slug . '/lectures-pdf'
                                        : 'course/' . $course->slug . '/' . $lesson->slug;
                                    $isCurrentLesson = $lesson->id === $lecture->id;
                                @endphp
                                <a href="{{ url($url) }}" target="{{ is_null($lesson->file) ? '_blank' : '' }}"
                                    class="group flex items-center gap-4 p-4 rounded-2xl border-2 transition-all duration-300
                                    {{ $isCurrentLesson ? 'border-[#3bcbbe] bg-[#3bcbbe]/5' : 'border-gray-200 hover:border-[#3bcbbe] hover:bg-gray-50' }}">
                                    
                                    <!-- Lesson Thumbnail -->
                                    <div class="flex-shrink-0  w-28 h-20 rounded-lg overflow-hidden {{ $isCurrentLesson ? 'ring-1 ring-[#3bcbbe]/90' : '' }}">
                                        @if (is_null($lesson->file) && is_null($lesson->external_link))
                                            <div class="w-full h-full bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex items-center justify-center">
                                                <iconify-icon icon="fluent:document-48-filled" width="40" height="40" style="color: #fff"></iconify-icon>
                                            </div>
                                        @else
                                            <img src="{{ asset($lesson->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $lesson->title }}">
                                        @endif
                                    </div>

                                    <!-- Lesson Info -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-xs font-bold text-[#3bcbbe] bg-[#3bcbbe]/10 px-2 py-1 rounded">
                                                Lesson {{ $index + 1 }}
                                            </span>
                                            @if ($isCurrentLesson)
                                                <span class="text-xs font-bold text-white bg-[#3bcbbe] px-2 py-1 rounded">
                                                    Now Playing
                                                </span>
                                            @endif
                                        </div>
                                        <h3 class="font-bold text-gray-900 group-hover:text-[#3bcbbe] transition-colors line-clamp-1">
                                            {{ $lesson->title }}
                                        </h3>
                                        <p class="text-sm text-gray-600 line-clamp-1">{{ $lesson->description }}</p>
                                    </div>

                                    <!-- Arrow Icon -->
                                    <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" 
                                        class="flex-shrink-0 text-[#3bcbbe] group-hover:translate-x-1 transition-transform mr-3">
                                    </iconify-icon>
                                </a>
                            @empty
                                <div class="text-center py-10">
                                    <iconify-icon icon="solar:book-minimalistic-broken" width="60" height="60" style="color: #d1d5db" class="mx-auto mb-3"></iconify-icon>
                                    <p class="text-gray-500 font-medium">No lessons available</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Column - Practice Tools -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 space-y-6">
                        <!-- Course Progress Card -->
                        <div class="bg-white rounded-3xl shadow-lg border-2 border-[#3bcbbe] p-6">
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-full flex items-center justify-center mx-auto mb-3">
                                    <iconify-icon icon="tabler:percentage-60" width="32" height="32"  style="color: #fff"></iconify-icon>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Your Progress</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-[15px]">
                                    <span class="text-gray-600">Lessons Progressing...</span>
                                    <span class="font-semibold text-[#3bcbbe]">{{ count($course->lessons) }} Total</span>
                                </div>
                            </div>
                        </div>

                        <!-- Practice Tools -->
                        <div class="bg-white rounded-3xl shadow-lg border-2 border-[#3bcbbe] p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Practice & Review</h3>
                            
                            <div class="space-y-4">
                                <!-- Flash Cards -->
                                <button onclick="flashCard()"
                                    class="w-full group bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl p-5 text-left hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all transform hover:-translate-y-1">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                                            <iconify-icon icon="material-symbols-light:cards-stack" width="28" height="28" style="color: #fff"></iconify-icon>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-white text-lg mb-1">Flash Cards</h4>
                                            <p class="text-white/90 text-sm">Quick review</p>
                                        </div>
                                        <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" 
                                            style="color: #fff" class="group-hover:translate-x-1 transition-transform">
                                        </iconify-icon>
                                    </div>
                                </button>

                                <!-- Practice Quiz -->
                                <a href="{{ route('course-quiz', ['course' => $course->slug]) }}"
                                    class="block w-full group bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-5 text-left hover:shadow-xl hover:shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                                            <iconify-icon icon="hugeicons:quiz-03" width="28" height="28" style="color: #fff"></iconify-icon>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-white text-lg mb-1">Practice Quiz</h4>
                                            <p class="text-white/90 text-sm">Test knowledge</p>
                                        </div>
                                        <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" 
                                            style="color: #fff" class="group-hover:translate-x-1 transition-transform">
                                        </iconify-icon>
                                    </div>
                                </a>

                                <!-- Practice Exam -->
                                <a href="{{ url('course/' . $course->slug . '/exam') }}"
                                    class="block w-full group bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl p-5 text-left hover:shadow-xl hover:shadow-orange-500/30 transition-all transform hover:-translate-y-1">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center flex-shrink-0">
                                            <iconify-icon icon="healthicons:i-exam-multiple-choice" width="28" height="28" style="color: #fff"></iconify-icon>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-white text-lg mb-1">Practice Exam</h4>
                                            <p class="text-white/90 text-sm">Final assessment</p>
                                        </div>
                                        <iconify-icon icon="ph:arrow-right-bold" width="20" height="20" 
                                            style="color: #fff" class="group-hover:translate-x-1 transition-transform">
                                        </iconify-icon>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Course Info Card -->
                        <div class="bg-gradient-to-br from-[#3bcbbe]/10 to-[#26beb1]/5 rounded-3xl border-2 border-[#3bcbbe]/20 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <iconify-icon icon="solar:info-circle-bold" width="24" height="24" style="color: #3bcbbe"></iconify-icon>
                                <h3 class="font-bold text-gray-900">Course Info</h3>
                            </div>
                            <div class="space-y-2 text-sm text-gray-700">
                                <p>• Self-paced learning</p>
                                <p>• Lifetime access</p>
                                <p>• Certificate included</p>
                                <p>• Expert support</p>
                            </div>
                        </div>
                    </div>
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
                        <iconify-icon icon="material-symbols-light:cards-stack" width="28" height="28" style="color: #fff"></iconify-icon>
                    </div>
                    <h2 class="text-3xl font-bold text-white">Flash Cards</h2>
                </div>
                <button onclick="cancelFlashcard()"
                    class="w-10 h-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center transition-all">
                    <iconify-icon icon="material-symbols:close" width="24" height="24" style="color: #fff"></iconify-icon>
                </button>
            </div>

            <!-- Flash Card Container -->
            <div class="p-8 md:p-12">
                <div id="flashCardContainer">
                    @forelse ($course->flashCards as $index => $flashCard)
                        <div class="flash-card hidden" data-index="{{ $index }}">
                            <div class="relative">
                                <div class="bg-gradient-to-br from-[#3bcbbe]/5 to-[#26beb1]/10 rounded-3xl p-10 min-h-[320px] border-2 border-[#3bcbbe]/20 shadow-inner">
                                    <div class="absolute top-6 right-6 text-[#3bcbbe] font-bold text-lg">
                                        Card {{ $index + 1 }} / {{ count($course->flashCards) }}
                                    </div>
                                    <div class="mt-8">
                                        <div class="inline-block px-4 py-2 bg-[#3bcbbe]/10 rounded-lg mb-6">
                                            <span class="text-[#3bcbbe] font-semibold text-sm uppercase tracking-wide">Question</span>
                                        </div>
                                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                                            {{ $flashCard->title }}
                                        </h3>
                                        <div class="inline-block px-4 py-2 bg-[#26beb1]/10 rounded-lg mb-4">
                                            <span class="text-[#26beb1] font-semibold text-sm uppercase tracking-wide">Answer</span>
                                        </div>
                                        <p class="text-lg text-gray-700 leading-relaxed max-h-[160px] overflow-y-auto pr-4 custom-scrollbar">
                                            {{ $flashCard->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16">
                            <iconify-icon icon="solar:card-broken" width="80" height="80" style="color: #d1d5db" class="mx-auto mb-4"></iconify-icon>
                            <p class="text-gray-500 font-medium text-lg">No Flashcards Available</p>
                        </div>
                    @endforelse
                </div>

                <!-- Navigation Controls -->
                @if (count($course->flashCards) > 0)
                    <div class="mt-10 flex items-center justify-between">
                        <button id="prevBtn"
                            class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-xl text-white text-lg font-bold hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all transform hover:-translate-x-1">
                            <iconify-icon icon="ph:caret-left-bold" width="24" height="24" style="color: #fff"></iconify-icon>
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
                            <iconify-icon icon="ph:caret-right-bold" width="24" height="24" style="color: #fff"></iconify-icon>
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

                    showFlashCard(currentIndex);
                }

                // Video completion tracking
                let videoElement = document.getElementById('video-lecture');
                if (videoElement) {
                    videoElement.onended = function() {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user-lesson') }}",
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            data: {
                                lessonId: {{ $lecture->id }},
                                userCourseId: {{ $userCourse->id }}
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }
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