@section('title', 'Progress Tracking & Reporting')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <h2 class="text-3xl font-bold text-[#26beb1]">
                {{ __('Progress Tracking & Reporting') }}
            </h2>
            <div class="sm:flex gap-3 items-center mt-4 sm:mt-0">
                <div class="relative flex items-center my-2 sm:my-0">
                    <input type="search" id="searchInput"
                        class="w-full sm:w-[220px] bg-white border border-gray-300 rounded-xl px-4 pl-11 pr-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] cursor-pointer transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-gray-400"
                        placeholder="Search user...">
                    <svg width="18" height="18"
                        class="absolute left-3.5 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400"
                        viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="7" cy="7" r="6.25" stroke="currentColor" stroke-width="1.5" />
                        <path d="M11 12L15 16" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </div>

                <a href="#" onclick="printDivAsPDF()"
                    class="sm:ml-1 py-3.5 px-6 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-white mt-10 border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
        <div class="overflow-x-auto">
            <div id="progress-table">
                <table class="min-w-full divide-y divide-[#3bcbbe]">
                    <thead class="bg-[#3bcbbe]/10">
                        <tr class="border-b-1 border-[#3bcbbe]">
                            <th class="text-sm font-semibold text-gray-700 text-center px-6 py-5 text-nowrap">Sr.No</th>
                            <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Course</th>
                            <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Enrolled Students</th>
                            <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Quiz Score</th>
                            <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Exam Score</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @forelse ($courses as $i => $course)
                            <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                                <td class="text-sm text-gray-700 font-semibold text-center px-6 py-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-[#3bcbbe]/10 text-[#3bcbbe] font-bold">
                                        {{ $i + 1 }}
                                    </span>
                                </td>
                                <td class="text-sm font-medium text-gray-800 text-left text-nowrap px-4 py-4">
                                    {{ $course->title }}
                                </td>
                                <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-purple-100 text-purple-700">
                                        {{ count($course->enrollments) }} Students
                                    </span>
                                </td>
                                <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-blue-100 text-blue-700">
                                        {{ number_format($course->user_quiz_average, 2) }}%
                                    </span>
                                </td>
                                <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-green-100 text-green-700">
                                        {{ number_format($course->user_exam_average, 2) }}%
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12">
                                    <div class="flex flex-col justify-center items-center">
                                        <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium text-lg">No progress data found</p>
                                        <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filters</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="px-4 py-4">
                                <div class="flex justify-between items-center">
                                    {{ $courses->links() }}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @push('script')
        <script>
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
                let baseUrl = "{{ url('/progress') }}";
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

            function printDivAsPDF() {
                let divContent = document.getElementById('progress-table').innerHTML;
                let originalContent = document.body.innerHTML;

                document.body.innerHTML = divContent;
                window.print();
                document.body.innerHTML = originalContent;
            }
        </script>
    @endpush
</x-app-layout>