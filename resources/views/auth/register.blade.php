<x-guest-layout>
    <div class="w-full max-w-[500px] mx-auto">
        <!-- Logo -->
        <div class="mb-8">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('logo.png') }}" alt="ClinEd Learning Hub" class="h-24 mb-4">
            </a>
            <h1 class="text-4xl font-bold text-gray-900 mb-3">Welcome</h1>
            <p class="text-base text-gray-600">
                Sign up to access <a href="#" class="text-[#3bcbbe] hover:text-[#2da89d] font-semibold transition-colors">ByteCloude Learning Hub</a> content
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <!-- Signup Form Card -->
        <div class="bg-white border-2 border-[#3bcbbe]/20 rounded-2xl p-8 shadow-sm">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.523 21.99H4.488c-1.503 0-2.663-1.134-2.466-2.624l.114-.869c.207-1.2 1.305-1.955 2.497-2.214L11.928 15h.144l7.295 1.283c1.212.28 2.29.993 2.497 2.214l.114.88c.197 1.49-.963 2.623-2.466 2.623zM17 7A5 5 0 1 1 7 7a5 5 0 0 1 10 0"/>
                        </svg>
                        Full Name
                    </label>
                    <input type="text" id="name" name="name" placeholder="Full Name" 
                        value="{{ old('name') }}" required autofocus
                        class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl px-4 py-3.5 outline-none focus:border-[#3bcbbe] focus:bg-white transition-all text-base placeholder:text-gray-400">
                    @error('name')
                        <span class="text-red-600 text-sm font-medium mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-xs"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <g fill="none">
                                <path fill="#3bcbbe" d="M3 5v-.75a.75.75 0 0 0-.75.75zm18 0h.75a.75.75 0 0 0-.75-.75zM3 5.75h18v-1.5H3zM20.25 5v12h1.5V5zM19 18.25H5v1.5h14zM3.75 17V5h-1.5v12zM5 18.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 5 19.75zM20.25 17c0 .69-.56 1.25-1.25 1.25v1.5A2.75 2.75 0 0 0 21.75 17z"/>
                                <path stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 5l9 9l9-9"/>
                            </g>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" id="email" name="email" placeholder="example@domain.com" 
                        value="{{ old('email') }}" required
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
                            <path fill="none" stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10H6a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-2m-8 0V7a4 4 0 0 1 4-4v0a4 4 0 0 1 4 4v3m-8 0h8m-4 4v3"/>
                        </svg>
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Enter your password"
                            required autocomplete="current-password"
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

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 48 48">
                            <g fill="none" stroke="#3bcbbe" stroke-linejoin="round" stroke-width="4">
                                <path d="M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z"/>
                                <path stroke-linecap="round" d="m16 24l6 6l12-12"/>
                            </g>
                        </svg>
                        Confirm Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter your password"
                            required
                            class="w-full bg-gray-50 border-2 border-gray-200 rounded-xl px-4 py-3.5 pr-12 outline-none focus:border-[#3bcbbe] focus:bg-white transition-all text-base placeholder:text-gray-400">
                        <button type="button" onclick="togglePassword(this, 'password_confirmation')" data-status="text"
                            class="absolute inset-y-0 end-0 flex items-center z-20 px-4 cursor-pointer text-gray-400 hover:text-[#3bcbbe] transition-colors">
                            <i class="fa-regular fa-eye-slash" id="icon-password_confirmation"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm font-medium mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-xs"></i>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-4 px-6 bg-gradient-to-r from-[#3bcbbe] to-[#2da89d] rounded-xl text-white text-base font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02]">
                        Signup
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-2">
                    <a class="text-sm text-gray-700" href="{{ route('login') }}">
                        Have an account? 
                        <span class="text-[#3bcbbe] hover:text-[#2da89d] font-semibold transition-colors">Login</span>
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer Text -->
        <p class="text-center text-sm text-gray-500 mt-6">
            By continuing, you agree to our Terms of Service and Privacy Policy
        </p>
    </div>
</x-guest-layout>