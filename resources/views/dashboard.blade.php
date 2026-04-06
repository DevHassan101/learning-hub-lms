@section('title', 'Dashboard')
<x-app-layout>
    <div class="space-y-6">
        <!-- Header with Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-[#26beb1]">Dashboard</h1>
                <p class="text-gray-600 mt-1">Plan, prioritize, and accomplish your tasks with ease.</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="px-6 py-3 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium text-sm">
                    Import Data
                </button>
                <button
                    class="px-6 py-3 bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] text-white rounded-xl hover:shadow-lg hover:shadow-emerald-500/30 transition-all duration-200 font-semibold text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Project
                </button>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Total Users Card -->
            <div
                class=" rounded-2xl p-6 border border-[#3bcbbe] bg-white relative overflow-hidden group hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/15 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-sm font-medium text-gray-600">Total Users</h3>
                        <button
                            class="p-2 flex justify-center items-center border border-[#307bcb] bg-gradient-to-r from-[#307bcb] to-[#1062bb] hover:bg-white/20 rounded-lg transition-all duration-200">
                            <iconify-icon icon="fa-solid:users" width="28" height="28"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>
                    <p class="text-4xl font-bold mb-3">{{ number_format($totalUsers) }}</p>
                    <div class="flex items-center gap-2 text-sm">
                        <span
                            class="inline-flex justify-center items-center gap-1 px-2 py-0.5 bg-[#3bcbbe]/10 text-[#3bcbbe] rounded-md font-medium">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Increased from last month
                        </span>
                    </div>
                </div>
            </div>

            <!-- Active Users Card -->
            <div
                class="relative overflow-hidden bg-white rounded-2xl p-6 border border-[#3bcbbe] hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/15 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-sm font-medium text-gray-600">Active Users</h3>
                        <button
                            class="p-2 flex justify-center items-center border border-[#30cb57] bg-gradient-to-r from-[#30cb57] to-[#1fb845] hover:bg-gray-50 rounded-lg transition-all duration-200">
                            <iconify-icon icon="mingcute:check-2-fill" width="26" height="26"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mb-3">{{ number_format($activeUsers) }}</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span
                            class="inline-flex justify-center items-center gap-1 px-2 py-0.5 bg-[#3bcbbe]/10 text-[#3bcbbe] rounded-md font-medium">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Increased from last month
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div
                class="bg-white rounded-2xl p-6 border border-[#3bcbbe] relative overflow-hidden group hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/15 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-sm font-medium text-gray-600">Total Courses</h3>
                        <button
                            class="p-2 flex justify-center items-center border border-[#b929c9] bg-gradient-to-r from-[#b929c9] to-[#a013af] hover:bg-gray-50 rounded-lg transition-all duration-200">
                            <iconify-icon icon="si:book-fill" width="26" height="26"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mb-3">{{ number_format($totalCourses) }}</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span
                            class="inline-flex justify-center items-center gap-1 px-2 py-0.5 bg-[#3bcbbe]/10 text-[#3bcbbe] rounded-md font-medium">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Increased from last month
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Programs Card -->
            <div
                class="bg-white rounded-2xl p-6 border border-[#3bcbbe] relative overflow-hidden group hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/15 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-50">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-sm font-medium text-gray-600">Total Departments</h3>
                        <button
                            class="p-2 flex justify-center items-center border border-[#d75730] bg-gradient-to-r from-[#d75730] to-[#cf481f] hover:bg-gray-50 rounded-lg transition-all duration-200">
                            <iconify-icon icon="basil:clipboard-solid" width="26" height="26"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mb-3">{{ number_format($totalPrograms) }}</p>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span
                            class="inline-flex justify-center items-center gap-1 px-2 py-0.5 bg-[#3bcbbe]/10 text-[#3bcbbe] rounded-md font-medium">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Increased from last month
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users Table -->
        <div class="bg-white rounded-2xl border border-[#3bcbbe] overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-[#000000dd]">Recent Users</h3>
                    <a href="{{ route('users.index') }}"
                        class="text-sm text-[#3bcbbe] hover:text-[#22b9ad] font-semibold flex items-center gap-2 hover:gap-3 transition-all">
                        View All Users
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-[#3bcbbe]/10">
                        <tr class="border-b border-t border-[#3bcbbfc8]">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700  tracking-wide">
                                Id</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700  tracking-wide">
                                Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700  tracking-wide">
                                Email</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700  tracking-wide">
                                Quiz Score</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700  tracking-wide">
                                Status</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700  tracking-wide">
                                Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($recentUsers as $user)
                            <tr class="hover:bg-gray-50 transition-all duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-b from-[#3bcbbe] to-[#2bcabc] rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-medium text-gray-900 capitalize">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-blue-100 text-blue-700">
                                        {{ number_format($user->user_quiz_average) }}%
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-4 py-1.5 rounded-lg text-xs font-semibold {{ $user->status == 1 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">No users found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- one --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative">
            <!-- Project Analytics Chart -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-[#3bcbbe]">
                <h3 class="text-lg font-bold text-[#000000dd] mb-6">Project Analytics</h3>
                <div class="flex items-end justify-between mt-14 h-96 gap-4">
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 28%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-gray-300 to-gray-200 rounded-t-2xl relative overflow-hidden shadow-md">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-gray-400/20 to-transparent">
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                48 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-gray-400">Sun</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Jan 19</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 60%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-[#36beb6] to-[#3bcbbe] rounded-t-2xl shadow-xl shadow-[#3bcbbe]/40 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-[#36beb6]/30 to-transparent">
                                </div>
                                <div
                                    class="absolute top-3 left-1/2 transform -translate-x-1/2 text-white text-xs font-bold bg-white/20 px-2.5 py-1 rounded-full backdrop-blur-sm">
                                    60%
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                68 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-[#36beb6]">Mon</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">Jan 20</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 80%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-[#36beb6] to-[#3bcbbe] rounded-t-2xl shadow-xl shadow-[#3bcbbe]/40 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-[#36beb6]/30 to-transparent">
                                </div>
                                <div
                                    class="absolute top-3 left-1/2 transform -translate-x-1/2 text-white text-xs font-bold bg-white/20 px-2.5 py-1 rounded-full backdrop-blur-sm">
                                    80%
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                68 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-[#36beb6]">Tue</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">Jan 22</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 100%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-[#36beb6] to-[#3bcbbe] rounded-t-2xl shadow-xl shadow-[#3bcbbe]/40 relative overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-[#36beb6]/30 to-transparent">
                                </div>
                                <div
                                    class="absolute top-3 left-1/2 transform -translate-x-1/2 text-white text-xs font-bold bg-white/20 px-2.5 py-1 rounded-full backdrop-blur-sm">
                                    100%
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                100 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-[#36beb6]">Wed</p>
                            <p class="text-[10px] text-gray-500 mt-0.5">Jan 23</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 45%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-gray-300 to-gray-200 rounded-t-2xl relative overflow-hidden shadow-md">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-gray-400/20 to-transparent">
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                48 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-gray-400">Thu</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Jan 24</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 35%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-gray-300 to-gray-200 rounded-t-2xl relative overflow-hidden shadow-md">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-gray-400/20 to-transparent">
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                48 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-gray-400">Fri</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Jan 25</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center flex-1 h-full justify-end group">
                        <div class="w-full relative transition-all duration-300 ease-out group-hover:scale-105"
                            style="height: 28%">
                            <div
                                class="w-full h-full bg-gradient-to-t from-gray-300 to-gray-200 rounded-t-2xl relative overflow-hidden shadow-md">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 to-white/20"></div>
                                <div
                                    class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-t from-gray-400/20 to-transparent">
                                </div>
                            </div>
                            <div
                                class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white px-3 py-1.5 rounded-lg text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap shadow-xl">
                                48 tasks
                                <div
                                    class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-800">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-xs font-bold text-gray-400">Sat</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Jan 26</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reminders & Project Progress -->
            <div class="space-y-6">
                <!-- Reminders Card -->
                <div class="bg-white rounded-2xl p-6 border border-[#3bcbbe]">
                    <h3 class="text-lg font-bold text-[#000000dd] mb-4">Reminders</h3>
                    <div class="space-y-4">
                        <div class="flex flex-col gap-2">
                            <h4 class="font-semibold text-[#000000b3]">Meeting with ByteCloude Company</h4>
                            <p class="text-sm text-gray-500">Time : 02.00 pm - 04.00 pm</p>
                            <button
                                class="mt-2 w-full flex items-center justify-center gap-2 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] text-white py-2.5 rounded-lg hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 font-medium text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                </svg>
                                Start Meeting
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Project Progress Card -->
                <div class="bg-white rounded-2xl p-6 border border-[#3bcbbe]">
                    <h3 class="text-lg font-bold text-[#000000dd] mb-4">Project Progress</h3>
                    <div class="relative flex items-center justify-center">
                        <svg class="w-32 h-32 transform -rotate-90">
                            <circle cx="64" cy="64" r="52" stroke="#f3f4f6" stroke-width="12"
                                fill="none" />
                            <circle cx="64" cy="64" r="52" stroke="#30cb57" stroke-width="12"
                                fill="none" stroke-dasharray="327" stroke-dashoffset="165" stroke-linecap="round"
                                class="transition-all duration-1000" />
                        </svg>
                        <div class="absolute text-center">
                            <p class="text-2xl font-bold text-[#000000dd]">55%</p>
                            <p class="text-xs text-gray-500">Project Ended</p>
                        </div>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-[#30cb57] rounded-full"></div>
                                <span class="text-gray-600">Completed</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-gray-900 rounded-full"></div>
                                <span class="text-gray-600">In Progress</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-gray-200 rounded-full"></div>
                                <span class="text-gray-600">Pending</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
