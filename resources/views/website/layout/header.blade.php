<nav class="bg-[#fefefe] sticky top-0 z-50 border-b border-[#3bcbbe]">
    <div class="flex flex-wrap items-center justify-between lg:px-20 mx-auto px-4 py-5">
        <!-- Logo -->
        <span class="flex items-center space-x-3 rtl:space-x-reverse group">
            <div class="relative">
                <img src="{{ asset('logo.png') }}"
                    class="h-[76px] relative z-10 transition-transform duration-300 group-hover:scale-105"
                    alt="CLXNED Learning Hub"  />
            </div>
        </span>

        <!-- Right Side: Auth & Mobile Toggle -->
        <div class="flex items-center md:order-2 space-x-3 md:space-x-5 rtl:space-x-reverse">
            @if (Auth::user())
                @role('admin')
                    <a href="{{ route('dashboard') }}"
                        class="text-white bg-gradient-to-r from-[#3bcbbe] via-[#2da89a] to-[#3bcbbe] bg-size-200 bg-pos-0 hover:bg-pos-100 shadow-md hover:shadow-xl hover:scale-105 focus:ring-4 focus:outline-none focus:ring-[#3bcbbe]/30 font-semibold rounded-full text-md px-10 py-3 text-center transition-all duration-300 hidden md:block">
                        Dashboard
                    </a>
                @else
                    <!-- Notifications -->
                    <div class="relative flex items-center">
                        <button id="notificationButton"
                            class="relative p-3.5 rounded-full border-2 border-[#3bcbbe]/40 bg-[#3bcbbe]/5 hover:bg-gradient-to-br hover:from-[#3bcbbe]/10 hover:to-[#2da89a]/10 transition-all duration-300 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 26 28"
                                fill="none" class="group-hover:scale-110 transition-transform duration-300">
                                <path
                                    d="M17.1509 20.487H8.84603M17.1509 20.487H22.1201C24.6995 20.487 24.2637 17.9234 22.9588 16.6223C18.2591 11.9431 24.9346 1.19128 12.9985 1.19128C1.06228 1.19128 7.73917 11.9418 3.0395 16.6223C1.78414 17.8738 1.24928 20.487 3.87823 20.487H8.84603M17.1509 20.487C17.1509 23.1402 16.2599 26.0001 12.9985 26.0001C9.73701 26.0001 8.84603 23.1402 8.84603 20.487"
                                    stroke="#3bcbbe" stroke-width="2.0674" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span id="notificationCount"
                                class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-gradient-to-r from-red-600 to-red-500 rounded-full shadow-md"></span>
                        </button>

                        <!-- Notification Dropdown -->
                        <div id="notificationDropdown"
                            class="hidden absolute right-0 mt-2 w-80 bg-white border border-gray-200/50 rounded-3xl shadow-2xl z-50 overflow-hidden backdrop-blur-xl"
                            style="top: 100%;">
                            <div class="p-5 bg-gradient-to-r from-[#3bcbbe] to-[#2da89a] text-white">
                                <h3 class="font-bold text-lg">Notifications</h3>
                                <p class="text-xs text-white/90 mt-1">You have <span id="notificationCountText">0</span> new
                                    notifications</p>
                            </div>
                            <div class="max-h-80 overflow-y-auto custom-scrollbar" id="notification-list">
                                <!-- Notifications will be populated here -->
                            </div>
                            <div class="p-4 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200/50">
                                <a href="{{ route('read-all') }}"
                                    class="block text-center text-[#3bcbbe] hover:text-[#2da89a] text-sm font-semibold transition-colors duration-300 hover:scale-105 transform">
                                    Mark all as read
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profileButton"
                            class="flex justify-center items-center space-x-2 px-5 py-2.5 bg-[#3bcbbe]/5 rounded-full hover:bg-gradient-to-r hover:from-[#3bcbbe]/10 hover:to-[#2da89a]/10 transition-all duration-300 group border-2 border-[#3bcbbe]/40 hover:border-[#3bcbbe]/60 shadow-sm hover:shadow-md">
                            <div
                                class="w-9 h-9 -ml-1 bg-gradient-to-br from-[#3bcbbe] via-[#2bcebb] to-[#3bcbbe] rounded-full flex items-center justify-center shadow-lg group-hover:shadow-2xl transition-all duration-300 group-hover:scale-110 ring-2 ring-[#3bcbbe]">
                                <iconify-icon icon="iconoir:profile-circle" width="22" height="22"
                                    style="color: #fff"></iconify-icon>
                            </div>
                            <span
                                class="hidden sm:block text-md font-semibold text-[#13c2b3] group-hover:text-[#3bcbbe] transition-colors duration-300 max-w-[120px] truncate">
                                {{ Auth::user()->name }}
                            </span>
                            <iconify-icon icon="lucide:chevron-down" width="20" height="20" id="profileArrow"
                                class="text-[#13c2b3] group-hover:text-[#3bcbbe] transition-all duration-300"></iconify-icon>
                        </button>

                        <!-- Profile Dropdown Menu -->
                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-3 w-64 bg-white/95 backdrop-blur-xl border-2 border-[#3bcbbe]/95 rounded-2xl shadow-2xl z-50 overflow-hidden"
                            style="top: 100%;">
                            <!-- Dropdown Header -->
                            <div class="py-4 px-6 bg-gradient-to-br from-[#3bcbbe] to-[#2da89a] shadow-xl text-white">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center ring-2 ring-white/30">
                                        <iconify-icon icon="streamline:user-profile-focus" width="20" height="20"
                                            style="color: #fff"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-base">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-white/80">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Dropdown Links -->
                            <div class="p-2">
                                <a href="{{ route('user.profile') }}"
                                    class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-[#3bcbbe]/10 hover:to-[#2da89a]/10 transition-all duration-300 group">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-br from-[#3bcbbe]/10 to-[#2da89a]/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <iconify-icon icon="basil:user-outline" width="22" height="22"
                                            style="color:#3bcbbe"></iconify-icon>
                                    </div>
                                    <span
                                        class="font-semibold text-gray-700 group-hover:text-[#3bcbbe] transition-colors">Profile</span>
                                </a>

                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit"
                                        class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-50 transition-all duration-300 group">
                                        <div
                                            class="w-10 h-10 bg-red-50 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <iconify-icon icon="mynaui:logout-solid" width="20" height="20"  style="color: rgb(230, 0, 0)"></iconify-icon>
                                        </div>
                                        <span
                                            class="font-semibold text-red-600 group-hover:text-red-700 transition-colors">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endrole
            @else
                <a href="{{ route('login') }}"
                    class="text-md px-10 py-2.5 text-[#3bcbbe] border-2 border-[#3bcbbe] hover:bg-[#3bcbbe] hover:text-white focus:ring-4 focus:outline-none focus:ring-[#3bcbbe]/30 font-medium tracking-wide rounded-full text-center transition-all duration-300 hover:scale-105 shadow-sm hover:shadow-lg hidden md:block">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="text-md px-10 py-2.5 text-white border-2 border-[#3bcbbe] bg-[#3bcbbe] bg-size-200 bg-pos-0 hover:bg-pos-100 shadow-md hover:shadow-xl hover:scale-105 focus:ring-4 focus:outline-none focus:ring-[#3bcbbe]/30 font-medium tracking-wide rounded-full  text-center transition-all duration-300 hidden md:block">
                    Sign Up
                </a>
            @endif

            <!-- Mobile Menu Toggle -->
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2.5 w-11 h-11 justify-center text-gray-600 rounded-full md:hidden hover:bg-gradient-to-br hover:from-[#3bcbbe]/10 hover:to-[#2da89a]/10 hover:text-[#3bcbbe] focus:outline-none focus:ring-2 focus:ring-[#3bcbbe]/30 transition-all duration-300"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation Links -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium mb-1 border border-gray-100 ml-24 bg-gray-50 md:space-x-1 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                <li>
                    <a href="{{ url('/') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-900 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('/') ? 'active' : '' }}"
                        aria-current="page">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('about-us') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-900 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('about-us') ? 'active' : '' }}">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('courses') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-900 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('courses') ? 'active' : '' }}">
                        Courses
                    </a>
                </li>
                <li>
                    <a href="{{ url('programs') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-900 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('programs') ? 'active' : '' }}">
                       Departments
                    </a>
                </li>
                <li>
                    <a href="{{ url('blogs') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-900 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('blogs') ? 'active' : '' }}">
                        Blogs
                    </a>
                </li>
                <li>
                    <a href="{{ url('contact-us') }}"
                        class="nav-link block py-3 px-5 md:p-0 md:px-5 md:py-3 text-gray-700 text-lg rounded-full transition-all duration-300 font-semibold relative {{ request()->is('contact-us') ? 'active' : '' }}">
                        Contact Us
                    </a>
                </li>

                <!-- Mobile Auth Links -->
                @role('user')
                    <li class="md:hidden border-t border-gray-200 mt-2 pt-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="block py-3 px-5 text-red-600 rounded-full hover:bg-red-50 transition-all duration-300 font-semibold">
                                Logout
                            </a>
                        </form>
                    </li>
                @else
                    <li class="md:hidden border-t border-gray-200 mt-2 pt-2">
                        <a href="{{ route('login') }}"
                            class="block py-3 px-5 text-center text-[#3bcbbe] border-2 border-[#3bcbbe] rounded-full hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 font-semibold mb-2">
                            Login
                        </a>
                    </li>
                    <li class="md:hidden">
                        <a href="{{ route('register') }}"
                            class="block py-3 px-5 text-center text-white bg-gradient-to-r from-[#3bcbbe] to-[#2da89a] rounded-full transition-all duration-300 font-semibold shadow-md">
                            Register
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #3bcbbe, #2da89a);
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #2da89a, #3bcbbe);
    }

    /* Gradient Animation */
    .bg-size-200 {
        background-size: 200% 100%;
    }

    .bg-pos-0 {
        background-position: 0% 0%;
    }

    .bg-pos-100 {
        background-position: 100% 0%;
    }

    /* Smooth backdrop blur support */
    @supports (backdrop-filter: blur(20px)) {
        nav {
            backdrop-filter: blur(20px);
        }
    }

    /* Notification dropdown animation */
    #notificationDropdown {
        animation: slideDown 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-15px) scale(0.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Premium Navigation Link Styles with Animated Underline */
    .nav-link {
        position: relative;
        overflow: visible;
    }

    /* Underline that starts from center and expands */
    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 50%;
        width: 0;
        height: 4px;
        background: linear-gradient(to top, #3bcbbe, #30d6c3);
        transform: translateX(-50%);
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 15px;
    }

    /* Hover effect - expand from center */
    .nav-link:hover::before {
        width: 40%;
    }

    /* Active state - full width underline */
    .nav-link.active::before {
        width: 30%;
    }

    .nav-link:hover {
        color: #3bcbbe;
    }

    /* Smooth transitions */
    .nav-link {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Pulse animation for notification badge */
    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.8;
        }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Mobile menu smooth transition */
    #navbar-cta {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Enhanced shadow on scroll (add via JS) */
    nav.scrolled {
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    // Notification dropdown toggle
    document.getElementById('notificationButton')?.addEventListener('click', function(e) {
        e.stopPropagation();
        const dropdown = document.getElementById('notificationDropdown');
        const profileDropdown = document.getElementById('profileDropdown');

        // Close profile dropdown if open
        if (profileDropdown && !profileDropdown.classList.contains('hidden')) {
            profileDropdown.classList.add('hidden');
            document.getElementById('profileArrow')?.classList.remove('rotate-180');
        }

        dropdown.classList.toggle('hidden');
    });

    // Profile dropdown toggle
    document.getElementById('profileButton')?.addEventListener('click', function(e) {
        e.stopPropagation();
        const dropdown = document.getElementById('profileDropdown');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const arrow = document.getElementById('profileArrow');

        // Close notification dropdown if open
        if (notificationDropdown && !notificationDropdown.classList.contains('hidden')) {
            notificationDropdown.classList.add('hidden');
        }

        // Toggle profile dropdown
        dropdown.classList.toggle('hidden');

        // Rotate arrow
        if (arrow) {
            arrow.classList.toggle('rotate-180');
        }
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const notificationButton = document.getElementById('notificationButton');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');
        const profileArrow = document.getElementById('profileArrow');

        // Close notification dropdown
        if (notificationButton && notificationDropdown &&
            !notificationButton.contains(event.target) &&
            !notificationDropdown.contains(event.target)) {
            notificationDropdown.classList.add('hidden');
        }

        // Close profile dropdown
        if (profileButton && profileDropdown &&
            !profileButton.contains(event.target) &&
            !profileDropdown.contains(event.target)) {
            profileDropdown.classList.add('hidden');
            if (profileArrow) {
                profileArrow.classList.remove('rotate-180');
            }
        }
    });

    // Add shadow on scroll
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 10) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Active link handling with smooth underline animation
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            // Remove active class from all links
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            // Add active class to clicked link
            this.classList.add('active');
        });
    });
</script>
