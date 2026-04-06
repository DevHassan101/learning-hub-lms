@section('title', 'User Management')
<x-app-layout>
    <x-slot name="header">
        <div class="sm:flex justify-between items-center gap-4">
            <h2 class="text-3xl font-bold text-[#26beb1]">
                {{ __('User Management') }}
            </h2>
            <div class="sm:flex gap-3 items-center mt-4 sm:mt-0">
                <select name="" id="program"
                    class="text-sm w-full sm:w-[200px] bg-white border border-gray-300 rounded-xl px-4 pr-10 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] cursor-pointer transition-all shadow-sm hover:border-gray-400">
                    <option value="" class="text-gray-700">All Programs</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->title }}</option>
                    @endforeach
                </select>
                
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

                <a href="{{ route('users.create') }}"
                    class="sm:ml-1 py-3.5 px-6 text-center bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-sm font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-105 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Add User
                </a>
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
                        {{-- <th class="text-sm font-bold text-gray-700 text-center px-4 py-5 text-nowrap">Programs</th> --}}
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Progress</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Complete Courses</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Quiz Score</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Exam Score</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Status</th>
                        <th class="text-sm font-semibold text-gray-700 text-center px-4 py-5 text-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @forelse ($users as $user)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-indigo-50/30 transition-all duration-200">
                            <td class="text-sm font-medium text-gray-800 text-left text-nowrap px-6 py-4">
                                <div class="flex items-center gap-3 capitalize">
                                    <div class="w-10 h-10  bg-gradient-to-b from-[#3bcbbe] to-[#2bcabc] rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="text-sm text-gray-600 text-left text-nowrap px-4 py-4">{{ $user->email }}</td>
                            {{-- <td class="text-sm text-gray-600 text-center text-nowrap px-4 py-4">
                                @php
                                    $already = [];
                                @endphp
                                @foreach ($user->subscriptions as $index => $item)
                                    @if ($item->plan->category && !in_array($item->plan->category->title, $already))
                                        @php
                                            array_push($already, $item->plan->category->title);
                                        @endphp
                                        @if($index != 0)<span class="text-gray-400">, </span>@endif
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-purple-100 text-purple-700">
                                            {{ $item->plan->category->title }}
                                        </span>
                                    @endif
                                @endforeach
                            </td> --}}
                            <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                {{ count($user->continueCourses) }}
                            </td>
                            <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                {{ count($user->completedCourses) }}
                            </td>
                            <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-blue-100 text-blue-700">
                                    {{ number_format($user->user_quiz_average) }}%
                                </span>
                            </td>
                            <td class="text-sm text-gray-700 font-semibold text-center text-nowrap px-4 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-green-100 text-green-700">
                                    {{ number_format($user->user_exam_average) }}%
                                </span>
                            </td>
                            <td class="text-sm text-center text-nowrap px-4 py-4">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-lg text-xs font-bold 
                                    {{ $user->status == 1 ? 'bg-[#30cb57] text-white/90 shadow-sm' : 'bg-gradient-to-r from-gray-400 to-gray-500 text-white shadow-sm' }}">
                                    {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="text-sm px-4 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="#" class="change-status group relative" data-id="{{ $user->id }}" data-status="{{ $user->status }}" title="View Details">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-t from-[#3bcbbe] to-[#28c1b4] flex items-center justify-center hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="group relative" title="Edit User">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-b from-purple-600 to-purple-500 flex items-center justify-center hover:shadow-lg hover:shadow-purple-500/40 transition-all duration-200 hover:scale-110">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <button type="button" class="delete-user group relative" data-id="{{ $user->id }}" title="Delete User">
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
                            <td colspan="9" class="py-12">
                                <div class="flex flex-col justify-center items-center">
                                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <p class="text-gray-500 font-medium text-lg">No users found</p>
                                    <p class="text-gray-400 text-sm mt-1">Try adjusting your search or filters</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9" class="px-4 py-4">
                            <div class="flex justify-between items-center">
                                {{ $users->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Status Modal -->
    <div id="status-modal"
        class="fixed inset-0 hidden items-center justify-center w-full bg-black/60 backdrop-blur-sm z-[100] transition-all duration-300">
        <div class="bg-white rounded-2xl p-10 min-w-[400px] shadow-2xl transform transition-all duration-300 scale-95 hover:scale-100">
            <form action="" id="status-form" method="post">
                @csrf
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-t from-amber-50 to-amber-100 flex items-center justify-center mb-4">
                       <iconify-icon icon="mingcute:alert-line" width="50" height="50"  style="color: rgb(245, 158, 11)"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Confirm Action</h3>
                    <p class="text-gray-600 text-center tracking-wide mb-6">
                        Do you really want to <span id="status-text" class="font-bold text-[#3bcbbe]"></span> this user?
                    </p>
                    <div class="flex gap-3 w-full">
                        <button type="submit"
                            class="flex-1 py-4 px-6 text-center tracking-wide bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-200 hover:scale-105">
                            Yes, Proceed
                        </button>
                        <button type="button" id="close-modal"
                            class="flex-1 py-4 px-6 text-center tracking-wide bg-gradient-to-r from-gray-500 to-gray-600 rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-gray-500/40 transition-all duration-200 hover:scale-105">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
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
                fetchData(1, searchQuery);
            });
            
            $('#program').change(function(e) {
                e.preventDefault();
                fetchData(1, searchQuery);
            });

            function fetchData(page, search, paginate = 10) {
                let baseUrl = "{{ url('/dashboard') }}";
                var program = $('#program').val();
                
                $.ajax({
                    url: baseUrl + "?page=" + page + "&search=" + search + '&paginate=' + paginate + '&program=' + program,
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

            $('.change-status').click(function(e) {
                e.preventDefault();
                $('#status-modal').removeClass('hidden');
                $('#status-modal').addClass('flex');
                let id = $(this).data('id');
                let status = $(this).data('status') == 1 ? 'deactivate' : 'activate';
                let url = "{{ url('users/change-status') }}" + "/" + id;
                $("#status-form").attr('action', url);
                $('#status-text').text(status);
            });
            
            $('#close-modal').click(function(e) {
                e.preventDefault();
                $('#status-modal').addClass('hidden');
                $('#status-modal').removeClass('flex');
            });
            
            $('.delete-user').click(function(e) {
                e.preventDefault();
                $('#object').text("user");
                $('#delete-modal').removeClass('hidden');
                $('#delete-modal').addClass('flex');
                let id = $(this).data('id');
                let url = "{{ url('users') }}" + "/" + id;
                $("#delete-form").attr('action', url);
            });
        </script>
    @endpush
</x-app-layout>