@section('title', 'Login')
<x-guest-layout>
    <div class="w-full max-w-[500px]">
        <!-- Logo -->
        <div class="mb-8">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('logo.png') }}" alt="ClinEd Learning Hub" class="h-24 mb-4">
            </a>
            <h1 class="text-4xl font-bold text-gray-900 mb-3">Welcome Back</h1>
            <p class="text-base text-gray-600">
                New to ByteCloude Learning Hub?
                <a href="{{ route('register') }}"
                    class="text-[#3bcbbe] hover:text-[#2da89d] font-semibold transition-colors">
                    Create an account now
                </a>
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-6" :status="session('status')" />

        <!-- Login Form Card -->
        <div class="bg-white border-2 border-[#3bcbbe]/20 rounded-2xl p-8 shadow-sm">
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="text-sm font-semibold text-gray-700 flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <g fill="none">
                                <path fill="#3bcbbe"
                                    d="M3 5v-.75a.75.75 0 0 0-.75.75zm18 0h.75a.75.75 0 0 0-.75-.75zM3 5.75h18v-1.5H3zM20.25 5v12h1.5V5zM19 18.25H5v1.5h14zM3.75 17V5h-1.5v12zM5 18.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 5 19.75zM20.25 17c0 .69-.56 1.25-1.25 1.25v1.5A2.75 2.75 0 0 0 21.75 17z" />
                                <path stroke="#3bcbbe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m3 5l9 9l9-9" />
                            </g>
                        </svg>
                        Email Address
                    </label>
                    <input type="email" id="email" name="email" placeholder="example@domain.com"
                        value="{{ old('email') }}" required autofocus
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
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="Enter your password" required
                            autocomplete="current-password"
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

                <!-- Forgot Password -->
                <div class="flex justify-end">
                    @if (Route::has('password.request'))
                        <a class="text-sm font-semibold text-[#3bcbbe] hover:text-[#2da89d] transition-colors"
                            href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-4 px-6 bg-gradient-to-r from-[#3bcbbe] to-[#2da89d] rounded-xl text-white text-base font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/30 transition-all duration-200 hover:scale-[1.02]">
                        Login Now
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer Text -->
        <p class="text-center text-sm text-gray-500 mt-6">
            By continuing, you agree to our Terms of Service and Privacy Policy
        </p>
    </div>
</x-guest-layout>
