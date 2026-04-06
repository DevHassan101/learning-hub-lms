<header class="z-20 border border-black/12 bg-white mb-3 rounded-2xl">
    <div class="flex justify-between items-center h-20 px-6">
        <!-- Left Section: Mobile Menu & Search -->
        <div class="flex items-center gap-4 flex-1">
            <button @click="sidebarOpen = true" class="text-gray-600 hover:text-emerald-600 focus:outline-none lg:hidden transition-all duration-200">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke-width="2">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            
            <!-- Search Bar -->
            <div class="hidden md:flex items-center gap-3 bg-gray-50 hover:bg-gray-100 rounded-xl px-4 py-3 transition-all duration-200 flex-1 max-w-md">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Search Task" class="bg-transparent border-none focus:ring-0 focus:outline-none text-sm text-gray-700 placeholder-gray-400 w-full p-0">
                <kbd class="hidden lg:inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold text-gray-500 bg-white border border-gray-200 rounded">
                    ⌘F
                </kbd>
            </div>
        </div>

        <!-- Right Section: Icons & Profile -->
        <div class="flex items-center gap-3">
            <!-- Email Icon -->
            <button class="p-2.5 text-blue-600 bg-blue-500/10 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </button>

            <!-- Notification Bell -->
            <button class="relative p-2.5 text-red-600 bg-red-500/10 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </button>

            <!-- User Profile with Dropdown -->
            <div class="relative flex items-center gap-3 pl-3 ml-3 border-l border-gray-200" x-data="{ dropdownOpen: false }">
                <div @mouseenter="dropdownOpen = true" @mouseleave="dropdownOpen = false" class="flex items-center gap-3 cursor-pointer group">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-lg flex items-center justify-center text-white font-bold shadow-md group-hover:shadow-lg transition-all duration-200">
                            A
                        </div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="hidden lg:flex items-center gap-2">
                        <div class="text-left">
                            <p class="text-sm font-semibold text-gray-900">Admin</p>
                            <p class="text-xs text-gray-500">admin@hcare.com</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <!-- Dropdown Menu -->
                <div x-show="dropdownOpen" 
                     @mouseenter="dropdownOpen = true" 
                     @mouseleave="dropdownOpen = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 top-full z-64  mt-3 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 
                     style="display: none;">
                    
                    <!-- Profile Info in Dropdown -->
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-900">Admin</p>
                        <p class="text-xs text-gray-500 mt-0.5">admin@hcare.com</p>
                    </div>

                    <!-- Dropdown Items -->
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>My Profile</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Settings</span>
                    </a>

                    <div class="border-t border-gray-100 my-2"></div>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>