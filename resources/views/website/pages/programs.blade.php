@extends('website.app')
@section('title', 'Subscriptions')
@section('main')
    <section class="py-20 px-6 lg:px-24 w-full bg-gray-50">
        <div class="max-w-7xl mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-14">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    Our Departments
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                    Choose Your Learning Path
                </h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Explore specialized learning paths designed to advance your skills and unlock professional growth
                    through flexible learning packages.
                </p>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($categories as $category)
                    <div
                        class="group bg-white rounded-2xl overflow-hidden border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2">

                        <!-- Program Image -->
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset($category->banner) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $category->title }}">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>

                            <!-- Program Badge -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="bg-white/90 flex justify-center items-center backdrop-blur-sm text-[#3bcbbe] text-sm font-semibold px-4 py-1.5 rounded-full shadow">
                                    <iconify-icon icon="ri:mini-program-line" width="15"
                                        style="color: #3bcbbe"></iconify-icon> &nbsp; {{ $category->title }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#3bcbbe] transition-colors">
                                {{ $category->title }}
                            </h3>

                            <!-- Description (short & attractive) -->
                            <p class="text-gray-600 text-[15px] leading-relaxed max-w-md mb-6">
                                Professional training courses designed for practical learning, industry excellence &
                                career advancement in modern professional environments.
                            </p>

                            <!-- Highlights -->
                            <div class="grid grid-cols-2 gap-3 mb-6 text-[15px]">
                                <div class="flex items-center gap-2 text-gray-700">
                                    <span class="w-2.5 h-2.5 bg-[#3bcbbe] rounded-full"></span>
                                    Flexible Access
                                </div>
                                <div class="flex items-center gap-2 text-gray-700">
                                    <span class="w-2.5 h-2.5 bg-[#3bcbbe] rounded-full"></span>
                                    Expert Instructors
                                </div>
                                <div class="flex items-center gap-2 text-gray-700">
                                    <span class="w-2.5 h-2.5 bg-[#3bcbbe] rounded-full"></span>
                                    Certification
                                </div>
                                <div class="flex items-center gap-2 text-gray-700">
                                    <span class="w-2.5 h-2.5 bg-[#3bcbbe] rounded-full"></span>
                                    Career Support
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <a href="{{ url('plan/' . encrypt($category->title)) }}" class="block w-full">
                                <button
                                    class="w-full py-3.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-300 flex items-center justify-center gap-2">
                                    <span>View Subscription Packages</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </button>
                            </a>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#3bcbbe] text-[#3bcbbe] font-semibold rounded-xl hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg">
                    <span>View All Departments</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

        </div>
    </section>
@endsection
