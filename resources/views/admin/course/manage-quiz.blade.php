@section('title', 'Quiz Management')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('course.show', ['course' => $course]) }}" 
                    class="group flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                    <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                            class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                            stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#26beb1]">
                    {{ __('Quiz Management') }}
                </h2>
            </div>
            <div class="flex flex-wrap gap-3 items-center mt-4 sm:mt-0">
                <button id="quiz-modal"
                    class="py-3 px-5 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Quiz Time
                </button>

                <label for="toggle" class="flex items-center cursor-pointer bg-white border border-gray-300 rounded-xl px-4 py-2.5 hover:border-[#3bcbbe] transition-all">
                    <span class="text-gray-700 font-medium text-sm">Time restricted</span>
                    <div class="relative mx-3">
                        <input type="checkbox" id="toggle" class="sr-only peer custom-switcher">
                        <div class="w-14 h-7 bg-gray-300 rounded-full peer-checked:bg-[#3bcbbe] transition"></div>
                        <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full shadow-md transform transition peer-checked:translate-x-7"></div>
                    </div>
                    <span class="text-gray-700 font-medium text-sm">Normal</span>
                </label>

                <a href="{{ route('course.add-quiz', ['course' => $course]) }}"
                    class="py-3 px-5 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Quiz
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white mt-10 border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
        <div class="overflow-x-auto">
            <!-- Time Restricted Quiz Table -->
            <table class="min-w-full divide-y divide-[#3bcbbe]" id="time-restricted">
                <thead class="bg-[#3bcbbe]/10">
                    <tr class="border-b-1 border-[#3bcbbe]">
                        <th class="text-sm font-semibold text-gray-700 text-center px-6 py-5 text-nowrap">S.NO</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Question</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($timeRestrictedQuiz as $i => $quiz)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm text-gray-700 font-semibold text-center px-6 py-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-[#3bcbbe]/10 text-[#3bcbbe] font-bold">
                                    {{ $i + 1 }}
                                </span>
                            </td>
                            <td class="text-sm font-medium text-gray-800 text-left px-4 py-4">
                                {{ $quiz->question }}
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('course.edit-quiz', ['quiz' => $quiz->id]) }}" class="group relative" title="Edit Quiz">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-purple-600 to-purple-500 flex items-center justify-center hover:shadow-lg hover:shadow-purple-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <button type="button" class="delete-quiz group relative" data-id="{{ $quiz->id }}" title="Delete Quiz">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-red-600 to-red-500 flex items-center justify-center hover:shadow-lg hover:shadow-red-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-12">
                                <div class="flex flex-col justify-center items-center">
                                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No time-restricted quiz found</p>
                                    <p class="text-gray-400 text-sm mt-1">Add quiz questions to get started</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="px-4 py-4">
                            <div class="flex justify-between items-center">
                                {{ $timeRestrictedQuiz->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>

            <!-- Normal Quiz Table -->
            <table class="hidden min-w-full divide-y divide-[#3bcbbe]" id="normal-quiz">
                <thead class="bg-[#3bcbbe]/10">
                    <tr class="border-b-1 border-[#3bcbbe]">
                        <th class="text-sm font-semibold text-gray-700 text-center px-6 py-5 text-nowrap">S.NO</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Question</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($normalQuiz as $i => $quiz)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm text-gray-700 font-semibold text-center px-6 py-4">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-[#3bcbbe]/10 text-[#3bcbbe] font-bold">
                                    {{ $i + 1 }}
                                </span>
                            </td>
                            <td class="text-sm font-medium text-gray-800 text-left px-4 py-4">
                                {{ $quiz->question }}
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('course.edit-quiz', ['quiz' => $quiz->id]) }}" class="group relative" title="Edit Quiz">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-purple-600 to-purple-500 flex items-center justify-center hover:shadow-lg hover:shadow-purple-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <button type="button" class="delete-quiz group relative" data-id="{{ $quiz->id }}" title="Delete Quiz">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-red-600 to-red-500 flex items-center justify-center hover:shadow-lg hover:shadow-red-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-12">
                                <div class="flex flex-col justify-center items-center">
                                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No normal quiz found</p>
                                    <p class="text-gray-400 text-sm mt-1">Add quiz questions to get started</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="px-4 py-4">
                            <div class="flex justify-between items-center">
                                {{ $normalQuiz->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Timer Modal -->
    <div id="timer-modal" class="hidden fixed inset-0 z-50 bg-black/40 flex justify-center items-center">
        <div class="bg-white rounded-2xl p-8 w-[90%] max-w-md shadow-xl relative">
            <!-- Close Button -->
            <button type="button" id="close-timer-modal" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Modal Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-b from-[#3bcbbe] to-[#2bcabc] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Set Quiz Time</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-[#21bbae] to-[#3bcbbe] mx-auto mt-2 rounded-full"></div>
            </div>

            <!-- Form -->
            <form action="{{route('course.update-timer',['course' => $course])}}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="time" class="text-md font-semibold text-gray-700 flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Quiz Time (in minutes)
                    </label>
                    <input type="number" name="time" id="time" min="1" value="{{ $course->quiz_time ?? 0.00 }}" required
                        class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-14 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] focus:bg-white transition-all text-md placeholder:text-gray-400 shadow-sm">
                </div>
                <button type="submit"
                    class="w-full py-4 px-6 text-center bg-gradient-to-b from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Time
                </button>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            // Toggle between quiz types
            $('#toggle').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#time-restricted').addClass('hidden');
                    $('#normal-quiz').removeClass('hidden');
                } else {
                    $('#normal-quiz').addClass('hidden');
                    $('#time-restricted').removeClass('hidden');
                }
            });

            // Show timer modal
            $('#quiz-modal').click(function() {
                $('#timer-modal').removeClass('hidden');
            });

            // Close timer modal
            $('#close-timer-modal').click(function() {
                $('#timer-modal').addClass('hidden');
            });

            // Delete quiz
            $('.delete-quiz').click(function(e) {
                e.preventDefault();
                $('#object').text("quiz");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('quiz') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });
        </script>
    @endpush
</x-app-layout>