@extends('layouts.app2')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
@section('main')
    <section
        class="min-h-[90vh] border-2 border-[#3bcbbe] rounded-2xl m-5 my-[5vh] p-8 shadow-xl shadow-[#3bcbbe]/20 bg-white"
        style='font-family: "Outfit", sans-serif;'>

        <!-- Back Button -->
        <a href="{{ url('/') }}" class="inline-block mb-6 group">
            <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="transition-transform group-hover:-translate-x-1">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.21934 7.29865C0.0788893 7.15802 -2.87182e-07 6.9674 -2.9587e-07 6.76865C-3.04557e-07 6.56989 0.0788893 6.37927 0.21934 6.23865L6.21934 0.238644C6.288 0.164958 6.3708 0.105856 6.4628 0.0648639C6.5548 0.0238721 6.65411 0.00183076 6.75482 5.40642e-05C6.85552 -0.00172264 6.95555 0.0168015 7.04894 0.0545222C7.14233 0.0922429 7.22716 0.148389 7.29838 0.219607C7.3696 0.290826 7.42574 0.37566 7.46346 0.469048C7.50118 0.562437 7.51971 0.662464 7.51793 0.763167C7.51615 0.86387 7.49411 0.963185 7.45312 1.05518C7.41213 1.14718 7.35303 1.22998 7.27934 1.29865L2.55934 6.01865L16.7493 6.01864C16.9483 6.01864 17.139 6.09766 17.2797 6.23831C17.4203 6.37897 17.4993 6.56973 17.4993 6.76864C17.4993 6.96756 17.4203 7.15832 17.2797 7.29897C17.139 7.43963 16.9483 7.51864 16.7493 7.51864L2.55934 7.51865L7.27934 12.2386C7.35303 12.3073 7.41213 12.3901 7.45312 12.4821C7.49411 12.5741 7.51616 12.6734 7.51793 12.7741C7.51971 12.8748 7.50118 12.9749 7.46346 13.0682C7.42574 13.1616 7.3696 13.2465 7.29838 13.3177C7.22716 13.3889 7.14233 13.445 7.04894 13.4828C6.95555 13.5205 6.85552 13.539 6.75482 13.5372C6.65412 13.5355 6.5548 13.5134 6.4628 13.4724C6.3708 13.4314 6.288 13.3723 6.21934 13.2986L0.21934 7.29865Z"
                    fill="#3bcbbe" />
            </svg>
        </a>

        <!-- Form Container -->
        <div class="flex justify-center items-center">
            <div class="w-full max-w-[600px]">

                <!-- Session Status -->
                <x-auth-session-status class="mb-6" :status="session('status')" />

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">User Profile</h1>
                    <p class="text-base text-gray-600">Update your account information</p>
                </div>

                <!-- Profile Form Card -->
                <div class="bg-white border-2 border-[#3bcbbe]/20 rounded-2xl p-8 shadow-sm">
                    <form method="POST" action="{{ route('user.profile-update') }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <label for="name" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19.523 21.99H4.488c-1.503 0-2.663-1.134-2.466-2.624l.114-.869c.207-1.2 1.305-1.955 2.497-2.214L11.928 15h.144l7.295 1.283c1.212.28 2.29.993 2.497 2.214l.114.88c.197 1.49-.963 2.623-2.466 2.623zM17 7A5 5 0 1 1 7 7a5 5 0 0 1 10 0" />
                                </svg>
                                Full Name
                            </label>
                            <input type="text" id="name" name="name" placeholder="Enter your name"
                                value="{{ old('name', auth()->user()->name) }}" required autofocus
                                class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl px-4 py-3.5 outline-none focus:border-[#3bcbbe] focus:bg-white transition-all text-base placeholder:text-gray-400">
                            @error('name')
                                <span class="text-red-600 text-sm font-medium mt-2 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path fill="#3bcbbe"
                                            d="M3 5v-.75a.75.75 0 0 0-.75.75zm18 0h.75a.75.75 0 0 0-.75-.75zM3 5.75h18v-1.5H3zM20.25 5v12h1.5V5zM19 18.25H5v1.5h14zM3.75 17V5h-1.5v12zM5 18.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 5 19.75zM20.25 17c0 .69-.56 1.25-1.25 1.25v1.5A2.75 2.75 0 0 0 21.75 17z" />
                                        <path stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m3 5l9 9l9-9" />
                                    </g>
                                </svg>
                                Email Address
                            </label>
                            <input type="email" id="email" name="email" placeholder="example@domain.com"
                                value="{{ old('email', auth()->user()->email) }}" required
                                class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl px-4 py-3.5 outline-none focus:border-[#3bcbbe] focus:bg-white transition-all text-base placeholder:text-gray-400">
                            @error('email')
                                <span class="text-red-600 text-sm font-medium mt-2 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 10H6a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-2m-8 0V7a4 4 0 0 1 4-4v0a4 4 0 0 1 4 4v3m-8 0h8m-4 4v3" />
                                </svg>
                                Password
                                <span class="text-xs text-gray-500 font-normal">(Leave blank to keep current)</span>
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="Enter new password"
                                    value="{{ old('password') }}"
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl px-4 py-3.5 pr-12 outline-none focus:border-[#3bcbbe] focus:bg-white transition-all text-base placeholder:text-gray-400">
                                <button type="button" onclick="togglePassword(this, 'password')" data-status="text"
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-4 cursor-pointer text-gray-400 hover:text-[#3bcbbe] transition-colors">
                                    <i class="fa-regular fa-eye-slash" id="icon-password"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="text-red-600 text-sm font-medium mt-2 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-xs"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full py-4 px-6 bg-gradient-to-r from-[#3bcbbe] to-[#2da89d] rounded-xl text-white text-base font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02] flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                    <polyline points="17 21 17 13 7 13 7 21" />
                                    <polyline points="7 3 7 8 15 8" />
                                </svg>
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Footer Text -->
                <p class="text-center text-sm text-gray-500 mt-6">
                    Your information is securely stored and protected
                </p>
            </div>
        </div>
    </section>
@endsection
