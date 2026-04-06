@section('title', 'Contact us')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <h2 class="text-3xl font-bold text-[#26beb1]">
                {{ __('Contact Us') }}
            </h2>
            <div class="sm:flex gap-3 items-center mt-4 sm:mt-0">
                <div class="relative flex items-center my-2 sm:my-0">
                    <input type="search" id="searchInput"
                        class="w-full sm:w-[220px] bg-white border border-gray-300 rounded-xl px-4 pl-11 pr-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] cursor-pointer transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-gray-400"
                        placeholder="Search message...">
                    <svg width="18" height="18"
                        class="absolute left-3.5 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400"
                        viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="7" cy="7" r="6.25" stroke="currentColor" stroke-width="1.5" />
                        <path d="M11 12L15 16" stroke="currentColor" stroke-width="1.5" />
                    </svg>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="bg-white mt-10 border border-[#3bcbbe] overflow-hidden shadow-md rounded-2xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#3bcbbe]">
                <thead class="bg-[#3bcbbe]/10">
                    <tr class="border-b-1 border-[#3bcbbe]">
                        <th class="text-sm font-semibold text-gray-700 text-left px-6 py-5 text-nowrap">Name</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Email</th>
                        <th class="text-sm font-semibold text-gray-700 text-left px-4 py-5 text-nowrap">Message</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse ($contactUsMessages as $message)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm font-medium text-gray-800 text-left text-nowrap px-6 py-4">
                                <div class="flex items-center gap-3 capitalize">
                                    <div class="w-10 h-10 bg-gradient-to-b from-[#3bcbbe] to-[#2bcabc] rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                        {{ strtoupper(substr($message->name, 0, 1)) }}
                                    </div>
                                    {{ $message->name }}
                                </div>
                            </td>
                            <td class="text-sm text-gray-600 text-left text-nowrap px-4 py-4">
                                {{ $message->email }}
                            </td>
                            <td class="text-sm text-gray-600 text-left px-4 py-4">
                                {{ Str::limit($message->message, 50) }}
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <button type="button" class="show-message group relative" data-message="{{ $message->message }}" title="View Message">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-t from-[#3bcbbe] to-[#28c1b4] flex items-center justify-center hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </button>
                                    <button type="button" class="delete-message group relative" data-id="{{ $message->id }}" title="Delete Message">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No messages found</p>
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
                                {{ $contactUsMessages->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Message Modal -->
    <div id="message-modal"
        class="hidden fixed inset-0 z-50 bg-black/40 flex justify-center items-center">
        <div class="bg-white rounded-2xl p-8 w-[90%] max-w-2xl shadow-xl relative max-h-[80vh] overflow-y-auto">
            <!-- Close Button -->
            <button type="button" class="close-modal absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Modal Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-b from-[#3bcbbe] to-[#2bcabc] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Message Details</h2>
                <div class="w-16 h-1 bg-gradient-to-r from-[#21bbae] to-[#3bcbbe] mx-auto mt-2 rounded-full"></div>
            </div>

            <!-- Message Content -->
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <p id="message-text" class="text-gray-700 text-md leading-relaxed whitespace-pre-wrap"></p>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('.close-modal').click(function(e) {
                e.preventDefault();
                $('#message-modal').addClass('hidden');
            });
             $(document).on('click','.show-message', function(e) {
                e.preventDefault();
                $('#message-modal').removeClass('hidden');
                let message = $(this).data('message');
                $('#message-text').text(message);
            });

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
                let baseUrl = "{{ url('/contact') }}";
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

            $('#close-modal').click(function(e) {
                e.preventDefault();
                $('#status-modal').addClass('hidden');
                $('#status-modal').removeClass('flex');
            });
            $(document).on('click', '.delete-message', function(e) {
                e.preventDefault();
                $('#object').text("message");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('contact') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });
        </script>
    @endpush
</x-app-layout>