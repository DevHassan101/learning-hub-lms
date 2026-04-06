@section('title', 'Quiz Management')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('course.show', ['course' => $course]) }}" class="mr-3">
                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" stroke="#6D51E7"
                            stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                {{ __('Unit Quiz Management') }}
            </div>
            <div class="flex flex-wrap my-5 sm:my-0">
                <button id="quiz-modal"
                    class="flex items-center ml-4 py-2 px-6 sm:px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[15px] font-medium hover:bg-indigo-500">
                    Quiz Time
                </button>

                <label for="toggle" class="flex items-center cursor-pointer">
                    <span class="ml-3 text-gray-700 font-medium text-[18px]">Time restricted</span>
                    <div class="relative mx-3">
                        <input type="checkbox" id="toggle" class="sr-only peer custom-switcher" value="hassan">
                        <div class="w-14 h-7 bg-gray-300 rounded-full peer-checked:bg-[#442AE2] transition"></div>
                        <div
                            class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full shadow-md transform transition peer-checked:translate-x-7">
                        </div>
                    </div>
                    <span class="text-gray-700 font-medium text-[18px]">Normal</span>
                </label>

                <a href="{{ route('course.add-lesson-quiz', ['course' => $course, 'lesson' => $lesson]) }}"
                    class="flex items-center ml-4 py-2 px-6 sm:px-10 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[15px] font-medium hover:bg-indigo-500">
                    Add Quiz
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#DFDCF3] border border-[#4228E2] overflow-hidden shadow-sm rounded-xl min-h-full">
        <div class="p-6 border-b border-gray-200 overflow-x-auto">
            <table class="min-w-full" id="time-restricted">
                <thead>
                    <tr>
                        <th class="text-nowrap px-3 text-[20px]">S.NO</th>
                        <th class="text-nowrap px-3 text-[20px]">Questions</th>
                        <th class="text-nowrap px-3 text-[20px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($timeRestrictedQuiz as $i => $quiz)
                        <tr class="border-b border-[#102935]">
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                {{ $i + 1 }}
                            </td>
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                {{ $quiz->question }}
                            </td>
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                <div class="flex justify-center">
                                    <a href="{{ route('course.edit-quiz', ['quiz' => $quiz->id]) }}" class="mr-3">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16.5" cy="16.5" r="16.5"
                                                fill="url(#paint0_linear_3085_4505)" />
                                            <path
                                                d="M18.9591 10.1077C18.9251 10.0736 18.8846 10.0465 18.8401 10.028C18.7955 10.0095 18.7478 10 18.6995 10C18.6513 10 18.6036 10.0095 18.559 10.028C18.5145 10.0465 18.474 10.0736 18.44 10.1077L11 17.5484V20.6334C11 20.7306 11.0386 20.8239 11.1074 20.8926C11.1761 20.9614 11.2694 21 11.3666 21H14.4516L21.8923 13.56C21.9264 13.526 21.9535 13.4855 21.972 13.441C21.9905 13.3964 22 13.3487 22 13.3005C22 13.2522 21.9905 13.2045 21.972 13.1599C21.9535 13.1154 21.9264 13.0749 21.8923 13.0409L18.9591 10.1077Z"
                                                fill="white" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3085_4505" x1="16.5"
                                                    y1="0" x2="16.5" y2="33"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4229E2" />
                                                    <stop offset="1" stop-color="#6552E7" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </a>
                                    <button class="delete-quiz" data-id="{{ $quiz->id }}" type="button">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16.5" cy="16.5" r="16.5"
                                                fill="url(#paint0_linear_3085_4508)" />
                                            <path
                                                d="M12 25C11.45 25 10.9793 24.8043 10.588 24.413C10.1967 24.0217 10.0007 23.5507 10 23V10H9V8H14V7H20V8H25V10H24V23C24 23.55 23.8043 24.021 23.413 24.413C23.0217 24.805 22.5507 25.0007 22 25H12ZM22 10H12V23H22V10ZM14 21H16V12H14V21ZM18 21H20V12H18V21Z"
                                                fill="white" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3085_4508" x1="16.5"
                                                    y1="0" x2="16.5" y2="33"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4229E2" />
                                                    <stop offset="1" stop-color="#6653E7" />
                                                </linearGradient>
                                            </defs>
                                        </svg>

                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="flex justify-center items-center">
                                    <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}"
                                        alt="">
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            {{ $timeRestrictedQuiz->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
            <table class="hidden min-w-full" id="normal-quiz">
                <thead>
                    <tr>
                        <th class="text-nowrap px-3 text-[20px]">S.NO</th>
                        <th class="text-nowrap px-3 text-[20px]">Questions</th>
                        <th class="text-nowrap px-3 text-[20px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($normalQuiz as $i => $quiz)
                        <tr class="border-b border-[#102935]">
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                {{ $i + 1 }}
                            </td>
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                {{ $quiz->question }}
                            </td>
                            <td class="text-[16px] font-regular py-3 text-center  text-nowrap p-3">
                                <div class="flex justify-center">
                                    <a href="{{ route('course.edit-quiz', ['quiz' => $quiz->id]) }}" class="mr-3">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16.5" cy="16.5" r="16.5"
                                                fill="url(#paint0_linear_3085_45052)" />
                                            <path
                                                d="M18.9591 10.1077C18.9251 10.0736 18.8846 10.0465 18.8401 10.028C18.7955 10.0095 18.7478 10 18.6995 10C18.6513 10 18.6036 10.0095 18.559 10.028C18.5145 10.0465 18.474 10.0736 18.44 10.1077L11 17.5484V20.6334C11 20.7306 11.0386 20.8239 11.1074 20.8926C11.1761 20.9614 11.2694 21 11.3666 21H14.4516L21.8923 13.56C21.9264 13.526 21.9535 13.4855 21.972 13.441C21.9905 13.3964 22 13.3487 22 13.3005C22 13.2522 21.9905 13.2045 21.972 13.1599C21.9535 13.1154 21.9264 13.0749 21.8923 13.0409L18.9591 10.1077Z"
                                                fill="white" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3085_45052" x1="16.5"
                                                    y1="0" x2="16.5" y2="33"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4229E2" />
                                                    <stop offset="1" stop-color="#6552E7" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </a>
                                    <button class="delete-quiz" data-id="{{ $quiz->id }}" type="button">
                                        <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="16.5" cy="16.5" r="16.5"
                                                fill="url(#paint0_linear_3085_45082)" />
                                            <path
                                                d="M12 25C11.45 25 10.9793 24.8043 10.588 24.413C10.1967 24.0217 10.0007 23.5507 10 23V10H9V8H14V7H20V8H25V10H24V23C24 23.55 23.8043 24.021 23.413 24.413C23.0217 24.805 22.5507 25.0007 22 25H12ZM22 10H12V23H22V10ZM14 21H16V12H14V21ZM18 21H20V12H18V21Z"
                                                fill="white" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3085_45082" x1="16.5"
                                                    y1="0" x2="16.5" y2="33"
                                                    gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#4229E2" />
                                                    <stop offset="1" stop-color="#6653E7" />
                                                </linearGradient>
                                            </defs>
                                        </svg>

                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="flex justify-center items-center">
                                    <img class="h-[300px] w-[300px] my-10" src="{{ asset('not-found.png') }}"
                                        alt="">
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            {{ $normalQuiz->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



    <div id="timer-modal"
        class="h-screen hidden items-center justify-center w-full bg-black bg-opacity-15 absolute top-0 bottom-0 right-0 z-[100]">
        <div class="bg-white rounded-xl p-10 min-w-[350px] shadow-2xl">
            <form action="{{route('lesson.update-timer',['lesson' => $lesson])}}" id="timer-form" method="post">
                @csrf
                @method("PUT")
                <center>
                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="Calendar / Timer">
                            <path id="Vector"
                                d="M12 13V9M21 6L19 4M10 2H14M12 21C7.58172 21 4 17.4183 4 13C4 8.58172 7.58172 5 12 5C16.4183 5 20 8.58172 20 13C20 17.4183 16.4183 21 12 21Z"
                                stroke="#442AE2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                    </svg>
                </center>
                <p class="mt-3 mb-1 text-center">
                    Set time duration for quiz <br> (enter time in minutes)
                </p>
                <input type="text" value="{{$lesson->quiz_duration}}" name="quiz_duration" required class="mb-3 rounded border border-slate-300 w-full" placeholder="Enter time in minutes">
                <div class="flex justify-around">
                    <button type="submit"
                        class="py-2 px-7 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500">Save</button>
                    <button type="button" id="close-modal"
                        class="py-2 px-7 text-center bg-red-500 rounded-xl text-white text-[16px] font-semibold hover:bg-red-600">Cancel</button>
                </div>
            </form>
        </div>
    </div>


    @push('script')
        <script>
            $('.delete-quiz').click(function(e) {
                e.preventDefault();
                $('#object').text("quiz");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('quiz') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });

            $('.custom-switcher').change(function(e) {
                e.preventDefault();
                let timeRestricted = $(this).is(':checked');
                $('#time-restricted').toggleClass('hidden');
                $('#normal-quiz').toggleClass('hidden');
            });
            $('#quiz-modal').click(function(e) {
                e.preventDefault();
                $('#timer-modal').addClass('flex');
                $('#timer-modal').removeClass('hidden');
            });
            $('#close-modal').click(function(e) {
                e.preventDefault();
                $('#timer-modal').addClass('hidden');
                $('#timer-modal').removeClass('flex');
            });
        </script>
    @endpush
</x-app-layout>
