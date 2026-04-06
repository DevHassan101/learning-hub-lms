<!-- Overlay for mobile -->
<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed z-20 inset-0 bg-black/30 backdrop-blur-sm transition-all duration-300 lg:hidden"></div>

<!-- Sidebar with margin and rounded corners -->
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 w-[330px] mr-3 transition-all duration-300 transform border border-black/10 bg-white overflow-y-auto scroll-sidebar rounded-2xl lg:translate-x-0 lg:static lg:inset-0 overflow-hidden ">

    <div class="h-full flex flex-col">
        <!-- Logo Section -->
        <div class="flex items-center px-7 py-6 flex-shrink-0 border-b border-gray-200">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div
                    class="relative w-16 h-16 bg-gradient-to-t from-[#47e1d4] to-[#49d6cd] rounded-xl flex items-center justify-center group-hover:shadow-xl group-hover:shadow-teal-500/30 transition-all duration-300">
                    <div class="w-12 h-12 flex items-center justify-center">
                        <img src="{{ asset('dashlogo.png') }}" alt="ClinEd Learning Hub" class="w-full">
                    </div>
                </div>
                <span>
                    <ul>
                        <li class="text-xl font-extrabold tracking-wide text-[#3bcbbe] uppercase"
                            style='font-family: "Delius", cursive;'>Bytecloude</li>
                        <li class="text-[12.5px] font-semibold tracking-wide uppercase text-gray-600"
                            style='font-family: "Delius", cursive;'>Learning Hub</li>
                    </ul>
                </span>
            </a>
        </div>

        <!-- Navigation - Scrollable if needed -->
        <nav class="px-6 flex-1 space-y-4 pt-4">
            <!-- Dashboard Link -->
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('dashboard') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('dashboard') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('dashboard') ? 'w-10 h-10 border border-white/25 bg-white/20 backdrop-blur-xl rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="mage:dashboard-fill" width="22" height="22"
                            style=" color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('dashboard') ? 'text-white' : 'text-[#3bcbbe]' }}">Dashboard</span>
                </div>
            </x-nav-link>

            <!-- User Management Link -->
            <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('users.*') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('users.*') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('users.*') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="fa-solid:users" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('users.*') ? 'text-white' : 'text-[#3bcbbe]' }}">Manage
                        Users</span>
                </div>
            </x-nav-link>

            <!-- Course Management Link -->
            <x-nav-link href="{{ route('course.index') }}" :active="request()->routeIs('course.*')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('course.*') ? 'text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('course.*') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('course.*') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="solar:book-bold" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('course.*') ? 'text-white' : 'text-[#3bcbbe]' }}">Manage
                        Courses</span>
                </div>
            </x-nav-link>

            <!-- Manage Programs Link -->
            <x-nav-link href="{{ route('program.index') }}" :active="request()->routeIs('program.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('program.index') ? 'bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('program.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('program.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="mingcute:wechat-miniprogram-fill" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('program.index') ? 'text-white' : 'text-[#3bcbbe]' }}">
                        Manage Department</span>
                </div>
            </x-nav-link>

            <!-- Flash Card Link -->
            <x-nav-link href="{{ route('flash-card.index') }}" :active="request()->routeIs('flash-card.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('flash-card.index') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('flash-card.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('flash-card.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="fluent:flash-sparkle-20-filled" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('flash-card.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Flash
                        Cards</span>
                </div>
            </x-nav-link>

            <!-- Progress Tracking -->
            <x-nav-link href="{{ route('progress.index') }}" :active="request()->routeIs('progress.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('progress.index') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('progress.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('progress.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="hugeicons:progress-04" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('progress.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Progress
                        Checking</span>
                </div>
            </x-nav-link>

            <!-- Blog -->
            <x-nav-link href="{{ route('blog.index') }}" :active="request()->routeIs('blog.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('blog.index') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('blog.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('blog.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="fluent:news-28-filled" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('blog.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Manage
                        Blogs</span>
                </div>
            </x-nav-link>

            <!-- Notifications -->
            <x-nav-link href="{{ route('notification.index') }}" :active="request()->routeIs('notification.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('notification.index') ? 'bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('notification.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('notification.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="bxs:bell" width="22" height="22" style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('notification.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Notifications</span>
                </div>
            </x-nav-link>

            <!-- Testimonial -->
            <x-nav-link href="{{ route('testimonial.index') }}" :active="request()->routeIs('testimonial.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('testimonial.index') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('testimonial.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('testimonial.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="tabler:message-filled" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('testimonial.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Testimonial</span>
                </div>
            </x-nav-link>

            <!-- Contact Us -->
            <x-nav-link href="{{ route('contact.index') }}" :active="request()->routeIs('contact.index')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('contact.index') ? 'bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('contact.index') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('contact.index') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon icon="mynaui:headphones-solid" width="22" height="22"
                            style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('contact.index') ? 'text-white' : 'text-[#3bcbbe]' }}">Contact
                        Us</span>
                </div>
            </x-nav-link>


            <!-- CMS -->
            {{-- <x-nav-link href="{{ route('cms') }}" :active="request()->routeIs('cms')"
                class="group flex items-center gap-3 px-0 py-2.5 rounded-full transition-all duration-200 {{ request()->routeIs('cms') ? ' text-white shadow-sm' : 'text-gray-600 hover:bg-gray-50' }}"
                style="{{ request()->routeIs('cms') ? 'background: linear-gradient(to right, #3bcbbe, #36beb6);' : '' }}">
                <div class="flex justify-center items-center gap-3 -ml-5">
                    <div
                        class="flex justify-center items-center {{ request()->routeIs('cms') ? 'w-10 h-10 border border-white/25 bg-white/20 rounded-full' : 'w-10 h-10 border border-[#3bcbbe] bg-gradient-to-r from-[#3bcbbe] to-[#36beb6] rounded-full' }}">
                        <iconify-icon
                            icon="streamline-ultimate:customer-relationship-management-lead-management-1-bold"
                            width="22" height="22" style="color: #fff"></iconify-icon>
                    </div>
                    <span
                        class="font-medium text-lg {{ request()->routeIs('cms') ? 'text-white' : 'text-[#3bcbbe]' }}">CMS</span>
                </div>
            </x-nav-link> --}}

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2 rounded-full text-sm bg-red-50 text-red-600 hover:bg-red-50 transition-all duration-200">
                    <div class="w-10 h-10 flex justify-center items-center rounded-full bg-red-100 -ml-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <span class="text-lg font-medium text-red-600">Logout</span>
                </button>
            </form>

        </nav>

        <!-- Download App Card - Refined minimal design -->
        <div class="px-4 pb-6 mt-6 flex-shrink-0">
            <div
                class="bg-gradient-to-br from-[#3bcbbe] to-[#36beb6] rounded-2xl p-5 relative overflow-hidden shadow-lg">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                <div class="relative">
                    <div
                        class="w-11 h-11 border border-white/25 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-base mb-1">Download Mobile App</h3>
                    <p class="text-white/70 text-xs mb-4 font-medium">Access learning on the go</p>
                    <button
                        class="w-full bg-white hover:bg-gray-50 text-teal-600 text-md font-medium py-3 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        Download Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
