@section('title', 'Course Management')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <h2 class="text-3xl font-bold text-[#26beb1]">
                {{-- {{ __('Course Management') }} --}} Manage Course
            </h2>
            <div class="sm:flex gap-3 items-center mt-4 sm:mt-0">
                <div class="relative flex items-center my-2 sm:my-0">
                    <input type="search" id="searchInput"
                        class="w-full sm:w-[220px] bg-white border border-gray-300 rounded-xl px-4 pl-11 pr-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] cursor-pointer transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-gray-400"
                        placeholder="Search course...">
                    <svg width="18" height="18"
                        class="absolute left-3.5 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400"
                        viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="7" cy="7" r="6.25" stroke="currentColor" stroke-width="1.5" />
                        <path d="M11 12L15 16" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </div>

                <a href="{{ route('course.create') }}"
                    class="sm:ml-1 py-3.5 px-6 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Create Course
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
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Category</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Description</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse ($courses as $course)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm font-medium text-gray-800 text-left text-nowrap px-6 py-4">
                                <a href="{{ route('course.show', ['course' => $course]) }}"
                                    class="hover:text-[#3bcbbe] transition-colors">{{ $course->title }}</a>
                            </td>
                            <td class="text-sm text-gray-600 text-left text-nowrap px-4 py-4">
                                {{ $course->category->title ?? '' }}
                            </td>
                            <td class="text-sm text-gray-600 text-left text-nowrap px-4 py-4">
                                {{ substr($course->description, 0, 30) }}
                                {{ strlen($course->description) > 30 ? '...' : '' }}
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('course.edit', ['course' => $course]) }}" class="group relative" title="Edit Course">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-purple-600 to-purple-500 flex items-center justify-center hover:shadow-lg hover:shadow-purple-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <button type="button" class="delete-course group relative" data-id="{{ $course->id }}" title="Delete Course">
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
                            <td colspan="4" class="py-12">
                                <div class="flex flex-col justify-center items-center">
                                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No courses found</p>
                                    <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filters</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="px-4 py-4">
                            <div class="flex justify-between items-center">
                                {{ $courses->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @push('script')
        {{-- <script>
            function paginate(a) {
                let paginate = $(a).val();
                let search = $('#searchInput').val();
                fetchData(1, search, paginate)
            };

            let searchQuery = '';
            $(document).on('click', '#paginationLinks a', function(event) {
                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                fetchData(page, searchQuery);
            });
            $('#searchInput').on('keyup', function() {
                searchQuery = $(this).val();
                console.log(searchQuery);

                fetchData(1, searchQuery); // Always fetch from page 1 when searching
            });

            function fetchData(page, search, paginate = 10) {
                let baseUrl = "{{ url('/course') }}";
                $.ajax({
                    url: baseUrl + "?page=" + page + "&search=" + search + '&paginate=' + paginate,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#myTable').html(data.table);
                        $('#paginationLinks').html(data.pagination);
                        $('.pagination-paginate').val(paginate);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
            $(document).on('click', '.delete-course', function(e) {
                e.preventDefault();
                $('#object').text("course");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('course') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });
        </script> --}}
    @endpush
</x-app-layout>