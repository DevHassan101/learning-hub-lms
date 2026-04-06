@section('title', 'Course Management')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('course.index') }}" 
                    class="group flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-[#3bcbbe] hover:border-[#3bcbbe] hover:bg-[#3bcbbe] transition-all duration-200">
                    <svg width="18" height="14" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.81818 7.54545H19M7.54545 1L1 7.54545L7.54545 14.0909" 
                            class="stroke-[#3bcbbe] group-hover:stroke-white transition-colors"
                            stroke-width="1.63636" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#26beb1]">
                    {{ __($course->title) }}
                </h2>
            </div>
            <div class="flex flex-wrap gap-3 items-center mt-4 sm:mt-0">
                <a href="{{ route('course.manage-exam', ['course' => $course]) }}"
                    class="py-3 px-5 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Manage Exam
                </a>
                <a href="{{ route('course.manage-quiz', ['course' => $course]) }}"
                    class="py-3 px-5 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Manage Quiz
                </a>
                <a href="{{ route('course.add-lesson', ['course' => $course]) }}"
                    class="py-3 px-5 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add Lessons
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white mt-10 border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#3bcbbe]">
                <thead class="bg-[#3bcbbe]/10">
                    <tr class="border-b-1 border-[#3bcbbe]">
                        <th class="text-sm font-semibold text-gray-700 text-left px-6 py-5 text-nowrap">Title</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Description</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lessons as $lesson)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm font-medium text-gray-800 text-left text-nowrap px-6 py-4">
                                {{ $lesson->title }}
                            </td>
                            <td class="text-sm text-gray-600 text-left px-4 py-4">
                                {{ substr($lesson->description, 0, 60) }}
                                {{ strlen($lesson->description) > 60 ? '...' : '' }}
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('course.manage-lesson-quiz', ['course' => $course, 'lesson' => $lesson]) }}" class="group relative" title="Manage Lesson Quiz">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-blue-600 to-blue-500 flex items-center justify-center hover:shadow-lg hover:shadow-blue-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="{{ route('course.edit-lesson', ['lesson' => $lesson]) }}" class="group relative" title="Edit Lesson">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-purple-600 to-purple-500 flex items-center justify-center hover:shadow-lg hover:shadow-purple-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <button type="button" class="delete-lesson group relative" data-id="{{ $lesson->id }}" title="Delete Lesson">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No lessons found</p>
                                    <p class="text-gray-400 text-sm mt-1">Add lessons to get started</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    @push('script')
        <script>
            $('.delete-lesson').click(function(e) {
                e.preventDefault();
                $('#object').text("lesson");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('lesson') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });
        </script>
    @endpush
</x-app-layout>