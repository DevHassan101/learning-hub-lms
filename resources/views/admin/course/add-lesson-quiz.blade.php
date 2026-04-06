@section('title', 'Add Lesson\'s Quiz')
<x-app-layout>

    <div class="bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl min-h-full">
        <div class="p-6 border-b border-gray-200 overflow-x-auto relative">

            <form action="{{ route('course.lesson-quiz.store', ['course' => $course, 'lesson' => $lesson]) }}" method="post">
                @csrf
                <div class="w-full">
                    <div class="flex justify-between items-center mb-7">
                        <h1 class="text-[22px] sm:text-[26px] md:text-[30px] lg:text-[36px] font-bold flex items-center">
                            <a href="{{ route('course.manage-lesson-quiz', ['course' => $course, 'lesson' => $lesson]) }}" class="mr-3">
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" stroke="#6D51E7"
                                        stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </a>
                            Add Quiz Questions - {{ $lesson->title}}
                        </h1>

                        <button type="submit"
                            class="py-2 px-5 sm:px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500">
                            Create
                        </button>

                    </div>
                    <div class="gap-2 grid grid-cols-2">
                        <div class="mb-3 w-full col-span-2">
                            <select name="type" id="" required
                                class="resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">
                                <option value="">Select Quiz Type</option>
                                <option value="normal" @selected(old('type') == 'normal')>Normal</option>
                                <option value="time restricted" @selected(old('type') == 'time restricted')>Time restricted</option>
                            </select>
                            @error('type')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <textarea name="question" id="" cols="30" rows="2" placeholder="Write Question" required
                                class="resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('question') }}</textarea>
                            @error('question')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <select name="answer" id="answer"
                                class="resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2 h-16">
                                <option value="">Select Answer</option>
                                <option value="option_a" data-option="a" @selected(old('answer') == 'option_a')>option A</option>
                                <option value="option_b" data-option="b" @selected(old('answer') == 'option_b')>option B</option>
                                <option value="option_c" data-option="c" @selected(old('answer') == 'option_c')>option C</option>
                                <option value="option_d" data-option="d" @selected(old('answer') == 'option_d')>option D</option>
                            </select>
                            @error('answer')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <textarea name="option_a" data-option="a" id="" cols="30" rows="2" placeholder="Write Option"
                                class="options resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('option_a') }}</textarea>
                            @error('option_a')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <textarea name="option_b" data-option="b" id="" cols="30" rows="2" placeholder="Write Option"
                                class="options resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('option_b') }}</textarea>
                            @error('option_b')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <textarea name="option_c" data-option="c" id="" cols="30" rows="2" placeholder="Write Option"
                                class="options resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('option_c') }}</textarea>
                            @error('option_c')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full">
                            <textarea name="option_d" data-option="d" id="" cols="30" rows="2" placeholder="Write Option"
                                class="options resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('option_d') }}</textarea>
                            @error('option_d')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 w-full col-span-2">
                            <textarea name="description" id="" cols="30" rows="5" placeholder="Write Description"
                                class="resize-none border border-[#482EE3] bg-transparent rounded-lg block w-full placeholder:text-[#102935] placeholder:text-[14px] p-2">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
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
