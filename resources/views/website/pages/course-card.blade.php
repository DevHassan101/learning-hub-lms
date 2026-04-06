@foreach ($courses as $course)
    <div
        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#3bcbbe] hover:border-[#3bcbbe]/50 hover:-translate-y-2">

        <!-- Course Image -->
        <div class="relative h-[18rem] overflow-hidden bg-gray-100">
            <img src="{{ asset($course->thumbnail) }}"
                class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700"
                alt="{{ $course->title }}">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
            </div>

            <!-- Badge Container at Bottom -->
            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                <!-- Lessons Badge -->
                <div class="flex items-center gap-1.5 bg-white/95 backdrop-blur-md rounded-full px-3 py-1.5 shadow-lg">
                    <svg class="w-4 h-4 text-[#3bcbbe]" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                    </svg>
                    <span class="text-xs font-bold text-gray-700">{{ count($course->lessons) }}</span>
                </div>

                <!-- New Badge (if course is new) -->
                @if ($course->created_at->diffInDays(now()) <= 30)
                    <div
                        class="bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                        NEW
                    </div>
                @endif
            </div>
        </div>

        <!-- Course Content -->
        <div class="p-6">
            <!-- Course Title -->
            <a href="{{ route('course-detail', ['course' => $course->slug]) }}" class="block mb-3">
                <h3
                    class="text-xl font-bold text-gray-900 group-hover:text-[#3bcbbe] transition-colors duration-300 line-clamp-2 leading-tight">
                    {{ $course->title }}
                </h3>
            </a>

            <!-- Course Description -->
            <p class="text-sm text-gray-600 line-clamp-3 mb-6 leading-relaxed">
                {{ $course->description }}
            </p>

            <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

            <!-- Enroll Button -->
            <a href="{{ route('course-detail', ['course' => $course->slug]) }}" class="block w-full">
                <button
                    class="w-full py-3.5 px-6 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                    <span>Enroll Now</span>
                    <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </a>
        </div>
    </div>
@endforeach
