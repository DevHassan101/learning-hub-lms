@extends('website.app')
@section('title', 'Contact Us')
@section('main')

<!-- Modern Contact Us Section -->
<section class="min-h-[85vh] py-20 px-6 lg:px-24 bg-gray-50">
    <div
        class="max-w-6xl mx-auto bg-white rounded-3xl border border-[#3bcbbe] shadow-sm hover:shadow-xl transition-all duration-300 p-10 sm:p-14 lg:p-20">

        <!-- Header -->
        <div class="text-center mb-14">
            <span
                class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                Support Center
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                We’re Here to Help You Succeed
            </h1>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Have questions about our courses, enrollments, or certifications? Our support team is ready to guide you every step of the way.
            </p>
        </div>

        <!-- Contact Info Cards -->
        <div class="grid sm:grid-cols-2 gap-6 mb-14 max-w-4xl mx-auto">

            <!-- Email Card -->
            <div
                class="flex items-center gap-4 p-6 rounded-2xl border border-[#3bcbbe] bg-white shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-[#3bcbbe]/10 text-[#3bcbbe]">
                    <iconify-icon icon="mdi:email-outline" width="26"></iconify-icon>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email Us</p>
                    <a href="mailto:bytecloude@learninghub.net"
                        class="text-lg font-semibold text-gray-800 hover:text-[#3bcbbe] transition">
                        bytecloude@learninghub.net
                    </a>
                </div>
            </div>

            <!-- WhatsApp Card -->
            <div
                class="flex items-center gap-4 p-6 rounded-2xl border border-[#3bcbbe] bg-white shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-[#3bcbbe]/10 text-[#3bcbbe]">
                    <iconify-icon icon="mdi:whatsapp" width="26"></iconify-icon>
                </div>
                <div>
                    <p class="text-sm text-gray-500">WhatsApp Support</p>
                    <a href="https://wa.me/923356343882" target="_blank"
                        class="text-lg font-semibold text-gray-800 hover:text-[#3bcbbe] transition">
                        +92 335 634 3882
                    </a>
                </div>
            </div>
        </div>

        <!-- Form + Map Layout -->
        <div class="grid grid-cols-1 gap-12 max-w-4xl mx-auto items-start">

            <!-- Contact Form -->
            <div>
                <form action="{{ route('contact-us.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-md font-semibold text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Enter your full name"
                                class="w-full rounded-xl border border-[#3bcbbe]/90 focus:border-[#3bcbbe] focus:ring-[#3bcbbe]/40 py-4 px-4">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-md font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter your email"
                                class="w-full rounded-xl border border-[#3bcbbe]/90 focus:border-[#3bcbbe] focus:ring-[#3bcbbe]/40 py-4 px-4">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-md font-semibold text-gray-700 mb-1">Your Message</label>
                        <textarea name="message" rows="6" placeholder="Tell us how we can help you..."
                            class="w-full rounded-xl border border-[#3bcbbe]/90 focus:border-[#3bcbbe] focus:ring-[#3bcbbe]/40 py-3 px-4">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-start pt-2">
                        <button type="submit"
                            class="px-10 py-3.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-300 flex items-center gap-2">
                            <span>Send Inquiry</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Google Map -->
            <div class="w-full h-full rounded-2xl overflow-hidden border border-[#3bcbbe] shadow-sm">
                <iframe
                    class="w-full h-[420px]"
                    src="https://www.google.com/maps?q=Islamabad%20Pakistan&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </div>
</section>

@endsection
