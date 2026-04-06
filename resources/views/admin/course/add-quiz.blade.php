@section('title', 'Add Quiz')
<x-app-layout>
    <div class="w-[80%] mx-auto px-4 py-6">
        <!-- Header with Back Button -->
        <div class="mb-6 flex items-center gap-4">
            <a href="{{ route('course.manage-quiz', ['course' => $course]) }}"
                class="group flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909"
                        class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors" stroke-width="1.63636"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-[#3bcbbe]">Add Quiz Question</h1>
                <p class="text-sm text-gray-600 mt-0.5">Create a new quiz question</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
            <div class="bg-gradient-to-r from-[#3bcbbe]/5 to-[#26beb1]/5 border-b border-[#3bcbbe]/40 px-6 py-5">
                <h2 class="text-lg font-semibold text-gray-900">Quiz Information</h2>
                <p class="text-sm text-gray-600 mt-1">Fill in the details below</p>
            </div>

            <div class="p-6">
                <form id="quiz-form" action="{{ route('course.quiz.store', ['course' => $course]) }}" method="post"
                    class="space-y-5">
                    @csrf

                    <!-- Quiz Type (Full Width) -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Quiz Type
                        </label>
                        <select name="type" required
                            class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white cursor-pointer transition-all text-sm shadow-sm hover:border-[#3bcbbe]/50">
                            <option value="" class="text-gray-700">Select Quiz Type</option>
                            <option value="normal" @selected(old('type') == 'normal')>Normal</option>
                            <option value="time restricted" @selected(old('type') == 'time restricted')>Time Restricted</option>
                        </select>
                        @error('type')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Question Field -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Question
                            </label>
                            <textarea name="question" cols="30" rows="2" placeholder="Write Question" required
                                class="resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('question') }}</textarea>
                            @error('question')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Correct Answer Field -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Correct Answer
                            </label>
                            <select name="answer" id="answer"
                                class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-[65px] outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white cursor-pointer transition-all text-sm shadow-sm hover:border-[#3bcbbe]/50">
                                <option value="" class="text-gray-700">Select Answer</option>
                                <option value="option_a" data-option="a" @selected(old('answer') == 'option_a')>Option A</option>
                                <option value="option_b" data-option="b" @selected(old('answer') == 'option_b')>Option B</option>
                                <option value="option_c" data-option="c" @selected(old('answer') == 'option_c')>Option C</option>
                                <option value="option_d" data-option="d" @selected(old('answer') == 'option_d')>Option D</option>
                            </select>
                            @error('answer')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Option A -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Option A
                            </label>
                            <textarea name="option_a" data-option="a" cols="30" rows="2" placeholder="Write Option A"
                                class="options resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('option_a') }}</textarea>
                            @error('option_a')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Option B -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Option B
                            </label>
                            <textarea name="option_b" data-option="b" cols="30" rows="2" placeholder="Write Option B"
                                class="options resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('option_b') }}</textarea>
                            @error('option_b')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Option C -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Option C
                            </label>
                            <textarea name="option_c" data-option="c" cols="30" rows="2" placeholder="Write Option C"
                                class="options resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('option_c') }}</textarea>
                            @error('option_c')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Option D -->
                        <div>
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                Option D
                            </label>
                            <textarea name="option_d" data-option="d" cols="30" rows="2" placeholder="Write Option D"
                                class="options resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('option_d') }}</textarea>
                            @error('option_d')
                                <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Description (Optional)
                        </label>
                        <textarea name="description" cols="30" rows="4" placeholder="Write Description"
                            class="resize-none w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-600 text-xs font-medium mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Divider & Buttons -->
                    <div class="border-t border-gray-200 pt-5 mt-6">
                        <div class="flex gap-3">
                            <a href="{{ route('course.manage-quiz', ['course' => $course]) }}"
                                class="flex-1 py-3.5 px-6 text-center bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 text-sm font-semibold transition-all duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex-1 py-3.5 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Create Question
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.options').on('input', function() {
                    let option = $(this).data('option');
                    let text = $(this).val();

                    let answerDropDown = $('#answer option[data-option="' + option + '"]');

                    $(answerDropDown).text("Option " + option.toUpperCase() + ": " + text);
                });
            });
        </script>
    @endpush
</x-app-layout>