@extends('website.app')
@section('main')
    <section class="py-20 px-6 lg:px-24 w-full bg-gray-50 cursor-pointer">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-14">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    About ByteCloud Learning Hub
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl text-gray-900 font-bold mb-4">
                    Transforming Online Education
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
            </div>
            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">

                <!-- Left: Image Card -->
                <div
                    class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#3bcbbe]">
                    <img src="https://c8health.com/hubfs/C8Health_November2024/images/CorporateTrainingBestPracticesforMaximumImpactinHealthcare-1715788942874.webp"
                        class="w-full h-[463px] object-cover group-hover:scale-105 transition-transform duration-500"
                        alt="Healthcare Training">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#3bcbbe]/40 via-[#3bcbbe]/10 to-transparent"></div>

                    <!-- Floating Badge -->
                    <div class="absolute top-5 left-5 float-animation">
                        <div class="flex items-center gap-2 border border-[#3bcbbe]/70 bg-white/90 backdrop-blur-sm rounded-full px-4 py-2 shadow-lg">
                            <iconify-icon icon="healthicons:education" width="20" height="20"
                                style="color:#3bcbbe"></iconify-icon>
                            <span class="text-sm font-semibold text-[#22b2a6]">Trusted Learning Hub</span>
                        </div>
                    </div>

                    <!-- Interactive Stats Overlay -->
                    <div class="absolute bottom-5 left-5 right-5 grid grid-cols-2 gap-3">
                        <div class="bg-white/95 backdrop-blur-sm rounded-lg p-3 hover:bg-white transition-all stat-counter">
                            <div class="text-2xl font-bold text-[#3bcbbe]">500+</div>
                            <div class="text-xs text-gray-600">Students Enrolled</div>
                        </div>
                        <div class="bg-white/95 backdrop-blur-sm rounded-lg p-3 hover:bg-white transition-all stat-counter">
                            <div class="text-2xl font-bold text-[#3bcbbe]">95%</div>
                            <div class="text-xs text-gray-600">Success Rate</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Content Card -->
                <div
                    class="group bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-[#3bcbbe] hover:-translate-y-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-[#3bcbbe] transition-colors">
                        Who We Are
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        ByteCloud Learning Hub was founded on a simple yet powerful vision: to make world class education
                        accessible to everyone, anywhere. We bridge the gap between industry expertise and modern
                        technology. We combine expert instruction, flexible learning, and technology driven teaching to
                        deliver real world impact.
                    </p>

                    <!-- Feature List -->
                    <div class="space-y-4 mb-8">
                        <div
                            class="flex items-start gap-3 group/item hover:translate-x-2 transition-transform duration-300">
                            <span
                                class="w-9 h-9 flex items-center justify-center rounded-full bg-[#3bcbbe]/10 text-[#3bcbbe] group-hover/item:bg-[#3bcbbe] group-hover/item:text-white transition-all">
                                ✓
                            </span>
                            <p class="text-gray-700 font-medium">Industry‑aligned IT Deparments</p>
                        </div>

                        <div
                            class="flex items-start gap-3 group/item hover:translate-x-2 transition-transform duration-300">
                            <span
                                class="w-9 h-9 flex items-center justify-center rounded-full bg-[#3bcbbe]/10 text-[#3bcbbe] group-hover/item:bg-[#3bcbbe] group-hover/item:text-white transition-all">
                                ✓
                            </span>
                            <p class="text-gray-700 font-medium">Expert‑led and career‑focused learning</p>
                        </div>

                        <div
                            class="flex items-start gap-3 group/item hover:translate-x-2 transition-transform duration-300">
                            <span
                                class="w-9 h-9 flex items-center justify-center rounded-full bg-[#3bcbbe]/10 text-[#3bcbbe] group-hover/item:bg-[#3bcbbe] group-hover/item:text-white transition-all">
                                ✓
                            </span>
                            <p class="text-gray-700 font-medium">Flexible, self‑paced online access</p>
                        </div>
                    </div>

                    <!-- CTA -->
                    <a href="#" class="inline-block">
                        <button
                            class="group/btn px-8 py-3.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-300 flex items-center gap-2">
                            <span>Explore Courses</span>
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
            <!-- Interactive Value Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div
                    class="group bg-white rounded-xl p-6 border border-[#3bcbbe] hover:border-[#3bcbbe] transition-all duration-300 hover:shadow-lg cursor-pointer">
                    <div
                        class="w-14 h-14 bg-[#3bcbbe]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3bcbbe] transition-all pulse-glow">
                        <iconify-icon icon="carbon:certificate" width="28" height="28"
                            class="text-[#3bcbbe] group-hover:text-white"></iconify-icon>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Learning Excellence</h4>
                    <p class="text-gray-600 text-sm">Evidence-based instruction from experienced industry professionals with real-world practical expertise.</p>
                </div>

                <div
                    class="group bg-white rounded-xl p-6 border border-[#3bcbbe] hover:border-[#3bcbbe] transition-all duration-300 hover:shadow-lg cursor-pointer">
                    <div
                        class="w-14 h-14 bg-[#3bcbbe]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3bcbbe] transition-all pulse-glow">
                        <iconify-icon icon="mdi:lightbulb-on-outline" width="28" height="28"
                            class="text-[#3bcbbe] group-hover:text-white"></iconify-icon>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Innovation First</h4>
                    <p class="text-gray-600 text-sm">Cutting-edge learning technology and modern teaching methods that prepare you for tomorrow's challenges.</p>
                </div>

                <div
                    class="group bg-white rounded-xl p-6 border border-[#3bcbbe] hover:border-[#3bcbbe] transition-all duration-300 hover:shadow-lg cursor-pointer">
                    <div
                        class="w-14 h-14 bg-[#3bcbbe]/10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3bcbbe] transition-all pulse-glow">
                        <iconify-icon icon="fluent:people-community-24-regular" width="28" height="28"
                            class="text-[#3bcbbe] group-hover:text-white"></iconify-icon>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Community Driven</h4>
                    <p class="text-gray-600 text-sm">Join a supportive global network of learners, mentors, and industry professionals.</p>
                </div>
            </div>

            <!-- Mission Statement -->
            <div
                class="bg-gradient-to-tl from-[#4ce1d5] to-[#3fd9cc] rounded-2xl p-10 text-center text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full -translate-x-20 -translate-y-20">
                    </div>
                    <div class="absolute bottom-0 right-0 w-60 h-60 bg-white rounded-full translate-x-20 translate-y-20">
                    </div>
                </div>
                <div class="relative z-10">
                    <iconify-icon icon="mage:goals" width="56" height="56" class="mx-auto mb-2"></iconify-icon>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4">Our Mission</h3>
                    <p class="text-lg max-w-3xl mx-auto leading-relaxed opacity-95">
                        To empower developers professionals with accessible, high-quality education that transforms careers
                        and improves clients care across communities.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <section class="pb-20 px-6 lg:px-34 w-full bg-gray-50 cursor-pointer">
        <div
            class="max-w-7xl mx-auto bg-white rounded-2xl border border-[#3bcbbe] shadow-sm hover:shadow-xl transition-all duration-300 p-10 sm:p-14 lg:p-20">

            <!-- Badge -->
            <div class="flex justify-center mb-6">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    Start Your Journey
                </span>
            </div>

            <!-- Heading -->
            <h2 class="text-center text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                Ready to take the next step?
            </h2>

            <!-- Subtext -->
            <p class="text-center text-gray-600 text-lg max-w-3xl mx-auto mb-3">
                Join ByteCloude Learning Hub today and gain access to world-class IT & Software education that accelerates your
                professional growth.
            </p>

            <p class="text-center text-[#3bcbbe] font-semibold text-lg mb-10">
                Start Learning Now
            </p>

            <!-- CTA Button -->
            <div class="flex justify-center">
                <a href="{{ url('programs') }}">
                    <button
                        class="px-12 py-4 bg-gradient-to-t from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-300 flex items-center gap-3">
                        <span>Explore Now</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </section>
    
    
@endsection
