@extends('website.app')
@section('main')
    <style>
        .gradient-bg {
            background-color: #fbfbfb;
            position: relative;
            overflow: hidden;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .floating-delayed {
            animation: float 6s ease-in-out 1s infinite;
        }

        .floating-slow {
            animation: float 8s ease-in-out 0.5s infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .service-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.3);
        }

        .glow-card {
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .pulse-ring {
            animation: pulse-ring 3s ease-in-out infinite;
        }

        @keyframes pulse-ring {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.15);
                opacity: 0.6;
            }
        }

        .shimmer {
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.3) 50%,
                    rgba(255, 255, 255, 0) 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        .circle-pattern {
            background-image: radial-gradient(circle, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        .gradient-text {
            background: linear-gradient(135deg, #3bcbbe 0%, #27dfd0 50%, #3bcbbe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
        }
    </style>

    <section class="gradient-bg min-h-screen relative px-20 bg-gray-50">
        <div class="circle-pattern absolute inset-0 opacity-30"></div>
        <div class="container mx-auto px-4 py-8 lg:py-16 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div class="space-y-7 relative z-10">
                    <div class="inline-block mb-2">
                        <span
                            class="flex justify-center items-center bg-[#3bcbbe]/5 border border-[#3bcbbe] text-[#3bcbbe] px-7 py-2 rounded-full text-sm font-medium">
                            <iconify-icon icon="bi:stars" width="18" height="18" style="color: #f4ed34"></iconify-icon>
                            <p class="ml-2">Trusted Online Learning Solutions</p>
                        </span>
                    </div>

                    <h1 class="text-6xl font-extrabold text-gray-900 leading-tight">
                        Your Learning Is <span class="gradient-text">Our Priority</span>
                    </h1>

                    <p class="text-gray-700 font-medium text-lg max-w-lg text-justify">
                        Experience high-quality learning with modern technology and expert instructors. We're here to
                        support your learning journey every step of the way. We're here to support your growth..
                    </p>

                    &nbsp;

                    <div class="flex gap-4 flex-wrap items-center">
                        <button
                            class="btn-primary flex justify-center items-center bg-gradient-to-r from-[#3bcbbe] to-[#26ccbe] hover:from-[#24b9ad] hover:to-[#3bcbbe] text-white font-medium px-8 py-4 rounded-xl transition duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 relative z-10">
                            Our Departments
                            &nbsp;
                            <iconify-icon icon="ph:arrow-right-duotone" width="24" height="24"
                                style="color: #fff"></iconify-icon>
                        </button>
                        <button
                            class="btn-primary flex justify-center items-center bg-gradient-to-r from-[#3bcbbe] to-[#26ccbe] hover:from-[#24b9ad] hover:to-[#3bcbbe] text-white font-medium px-10 py-4 rounded-xl transition duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 relative z-10">
                            Learn More
                            &nbsp;
                            <iconify-icon icon="ph:arrow-right-duotone" width="24" height="24"
                                style="color: #fff"></iconify-icon>
                        </button>
                    </div>

                    <!-- Services Grid -->
                    <div class="pt-8">
                        <h3 class="text-gray-700 font-bold mb-6 text-lg">Our Learning Departments</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Service Card 1 -->
                            <div class="bg-white border-2 border-[#3bcbbe] p-5 rounded-xl text-center group">
                                <div
                                    class="bg-gradient-to-b from-[#3bcbbe] to-[#01bdad] w-14 h-14 flex items-center justify-center mx-auto mb-3 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                                    <iconify-icon icon="streamline-plump:web" width="30" height="30"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">Web Development</p>
                            </div>

                            <!-- Service Card 2 -->
                            <div class="bg-white border-2 border-[#3bcbbe] p-5 rounded-xl text-center group">
                                <div
                                    class="bg-gradient-to-t from-[#3bcbbe] to-[#01bdad] w-14 h-14 flex items-center justify-center mx-auto mb-3 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                                    <iconify-icon icon="ant-design:mobile-outlined" width="31" height="31"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">Mobile App Development</p>
                            </div>

                            <!-- Service Card 3 -->
                            <div class="bg-white border-2 border-[#3bcbbe] p-5 rounded-xl text-center group">
                                <div
                                    class="bg-gradient-to-b from-[#3bcbbe] to-[#01bdad] w-14 h-14 flex items-center justify-center mx-auto mb-3 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                                    <iconify-icon icon="icon-park-outline:graphic-design" width="30" height="30"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">UI / UX Figma Design</p>
                            </div>

                            <!-- Service Card 4 -->
                            <div class="sbg-white border-2 border-[#3bcbbe] p-5 rounded-xl text-center group">
                                <div
                                    class="bg-gradient-to-t from-[#3bcbbe] to-[#01bdad] w-14 h-14 flex items-center justify-center mx-auto mb-3 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                                    <iconify-icon icon="nimbus:marketing" width="30" height="30"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">Digital Marketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Hero Image -->
                <div class="relative flex justify-center items-center lg:justify-end mt-4">
                    <div class="relative w-full max-w-[550px] mx-auto">
                        <!-- Main Circle with Gradient -->
                        <div class="relative w-full aspect-square">

                            <!-- Nurse Image -->
                            <div class="nurse-image relative z-20">
                                <img src="https://png.pngtree.com/png-clipart/20250119/original/pngtree-happy-student-in-bright-casual-outfit-carrying-books-png-image_19835739.png"
                                    alt="Professional Nurse" class="">
                                <div
                                    class="image-overlay absolute bottom-0 w-full left-0 right-0 h-48 shadow-lg bg-gradient-to-t from-[#3bcbbe] to-[#1de1d0] rounded-full -z-10">
                                </div>
                            </div>

                            <!-- Decorative Elements -->
                            <div
                                class="floating absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-xl rotate-12">
                                <iconify-icon icon="fontisto:heart" width="32" height="32"
                                    style="color: #fff"></iconify-icon>
                            </div>

                            <div
                                class="floating-delayed absolute z-40 -bottom-5 -left-3 w-16 h-16 bg-gradient-to-br from-orange-400 to-red-600 rounded-2xl flex items-center justify-center shadow-xl">
                                <iconify-icon icon="streamline:graph-bar-increase-solid" width="32" height="32"
                                    style="color: #fff"></iconify-icon>
                            </div>

                            <!-- Stats Card - Top Left -->
                            <div
                                class="floating absolute -top-6 -left-10 rounded-3xl p-5 flex items-center gap-4 z-20 shadow-lg">
                                <div class="relative">
                                    <div
                                        class="bg-gradient-to-br from-blue-500 to-blue-700 w-16 h-16 rounded-2xl flex items-center justify-center">
                                        <iconify-icon icon="solar:presentation-graph-bold" width="32" height="32"
                                            style="color: #fff"></iconify-icon>
                                    </div>
                                </div>
                                <div>
                                    <p class="stats-number gradient-text">35K+</p>
                                    <p class="text-xs text-gray-600 font-medium leading-tight mt-1">Happy
                                        Students<br>Treated Successfully</p>
                                </div>
                            </div>


                            <!-- Experts Card - Bottom Right -->
                            <div
                                class="floating-delayed bg-white absolute -bottom-10 -right-10 rounded-3xl p-5 z-20 shadow-lg min-w-[200px]">
                                <p class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    Our Quality Instructors
                                </p>
                                <div class="flex items-center">
                                    <img src="https://monarcheducation.co.uk/wp-content/uploads/2024/02/AdobeStock_277896574-scaled-e1709200989587.jpeg"
                                        class="w-12 h-12 rounded-full border-4 border-white object-cover shadow-lg -ml-0"
                                        alt="Doctor 1">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2zntNLORnH_QtZ4miM_SniV-7LFXMyL4wGQ&s"
                                        class="w-12 h-12 rounded-full border-4 border-white object-cover shadow-lg -ml-3"
                                        alt="Doctor 2">
                                    <img src="https://umaine.edu/edhd/wp-content/uploads/sites/54/2023/03/Teacher-burnout-news-feature.jpg"
                                        class="w-12 h-12 rounded-full border-4 border-white object-cover shadow-lg -ml-3"
                                        alt="Doctor 3">
                                    <div
                                        class="w-12 h-12 rounded-full border-4 border-white bg-gradient-to-t from-[#3bcbbe] to-[#1de1d0] flex items-center justify-center text-white text-sm font-bold shadow-lg -ml-3">
                                        12+
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-24 w-full relative overflow-hidden bg-gray-50">
        <div class="w-full relative z-10">

            <div class="text-center mb-14">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-4 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    About ByteCloud Learning Hub
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl text-gray-900 font-bold mb-4">
                    Transforming Online Education
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Building the next generation of confident, skilled professionals
                </p>
            </div>

            <!-- Hero Stats Banner -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16 slide-up">
                <div
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center hover-lift border border-[#3bcbbe]/90 shadow-sm">
                    <div
                        class="text-4xl font-black bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] bg-clip-text text-transparent mb-2">
                        500+</div>
                    <div class="text-sm text-gray-600 font-medium">Active Students</div>
                </div>
                <div
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center hover-lift border border-[#3bcbbe]/90 shadow-sm">
                    <div
                        class="text-4xl font-black bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] bg-clip-text text-transparent mb-2">
                        95%</div>
                    <div class="text-sm text-gray-600 font-medium">Success Rate</div>
                </div>
                <div
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center hover-lift border border-[#3bcbbe]/90 shadow-sm">
                    <div
                        class="text-4xl font-black bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] bg-clip-text text-transparent mb-2">
                        50+</div>
                    <div class="text-sm text-gray-600 font-medium">Expert Instructors</div>
                </div>
                <div
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center hover-lift border border-[#3bcbbe]/90 shadow-sm">
                    <div
                        class="text-4xl font-black bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] bg-clip-text text-transparent mb-2">
                        24/7</div>
                    <div class="text-sm text-gray-600 font-medium">Learning Access</div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">

                <!-- Left: Story Card -->
                <div class="space-y-6 slide-up">
                    <div class="inline-flex items-center gap-2 bg-[#3bcbbe]/10 px-4 py-2 rounded-full">
                        <div class="w-2 h-2 bg-[#3bcbbe] rounded-full animate-pulse"></div>
                        <span class="text-sm font-semibold text-[#3bcbbe]">Our Story</span>
                    </div>

                    <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">
                        Empowering Learners Through
                        <span class="text-[#3bcbbe]">Innovation & Excellence</span>
                    </h3>

                    <p class="text-gray-600 text-lg leading-relaxed text-justify">
                        ByteCloud Learning Hub was founded on a simple yet powerful vision: to make world class education
                        accessible to everyone, anywhere. We bridge the gap between industry expertise and modern
                        technology. We combine expert instruction, flexible learning, and technology driven teaching to
                        deliver real world impact.
                    </p>

                    <div class="grid grid-cols-2 gap-4">
                        <div
                            class="flex items-start gap-3 p-4 bg-white rounded-xl border border-[#3bcbbe]/90 hover:bg-white transition-all">
                            <div
                                class="w-12 h-12 bg-[#3bcbbe]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <iconify-icon icon="mdi:shield-check" class="text-[#3bcbbe]"
                                    width="23"></iconify-icon>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-md">Certified</div>
                                <div class="text-sm text-gray-600">Recognized globally</div>
                            </div>
                        </div>
                        <div
                            class="flex items-start gap-3 p-4 bg-white rounded-xl border border-[#3bcbbe]/90 hover:bg-white transition-all">
                            <div
                                class="w-12 h-12 bg-[#3bcbbe]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <iconify-icon icon="mdi:clock-fast" class="text-[#3bcbbe]" width="23"></iconify-icon>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 text-md">Flexible</div>
                                <div class="text-sm text-gray-600">Learn at your pace</div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="inline-block group">
                        <button
                            class="px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-bold rounded-xl hover:shadow-2xl hover:shadow-[#3bcbbe]/40 transition-all duration-300 flex items-center gap-3 gradient-animate">
                            <span>Start Your Journey</span>
                            <iconify-icon icon="mdi:arrow-right" width="24"
                                class="group-hover:translate-x-2 transition-transform"></iconify-icon>
                        </button>
                    </a>
                </div>

                <!-- Right: Image Grid -->
                <div class="grid grid-cols-2 gap-4 slide-up">
                    <div class="space-y-4">
                        <div
                            class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift">
                            <img src="https://lsuonline-static.s3.amazonaws.com/media/images/2023/07/12/How_OnlineEd_Prepares_You-1000x563.jpg"
                                class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Healthcare Training">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#3bcbbe]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="absolute bottom-4 left-4 text-white font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                Professional Training
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl p-6 text-white hover-lift">
                            <iconify-icon icon="mdi:certificate-outline" width="40" class="mb-3"></iconify-icon>
                            <div class="text-2xl font-bold mb-1">Certified</div>
                            <div class="text-sm opacity-90">Industry-recognized credentials</div>
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover-lift border border-[#3bcbbe]/80">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 bg-[#3bcbbe]/10 rounded-xl flex items-center justify-center">
                                    <iconify-icon icon="mdi:account-group" class="text-[#3bcbbe]"
                                        width="28"></iconify-icon>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900">Community</div>
                                    <div class="text-xs text-gray-600">Global network</div>
                                </div>
                            </div>
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full bg-[#3bcbbe] border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-[#26beb1] border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-[#22b2a6] border-2 border-white"></div>
                                <div
                                    class="w-8 h-8 rounded-full bg-[#3bcbbe]/50 border-2 border-white flex items-center justify-center text-xs font-bold text-white">
                                    +500</div>
                            </div>
                        </div>
                        <div
                            class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift">
                            <img src="https://cdn.cpdonline.co.uk/wp-content/uploads/2020/08/28145729/Staff-wellbeing-in-schools.jpg"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Online Learning">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#3bcbbe]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Core Values -->
            <div class="w-full">
                <div class="text-center mb-12">
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">Our Core Values</h3>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#3bcbbe]/95 hover:border-[#3bcbbe] overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/5 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-700">
                        </div>
                        <div class="relative">
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#3bcbbe]/30 float-slow">
                                <iconify-icon icon="carbon:certificate" width="32" class="text-white"></iconify-icon>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#3bcbbe] transition-colors">
                                Learning Excellence</h4>
                            <p class="text-gray-600 leading-relaxed text-justify">Evidence-based instruction from
                                experienced industry professionals with real-world practical expertise.</p>
                        </div>
                    </div>

                    <div
                        class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#3bcbbe]/95 hover:border-[#3bcbbe] overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/5 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-700">
                        </div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#3bcbbe]/30 float-slow"
                                style="animation-delay: 1s;">
                                <iconify-icon icon="mdi:lightbulb-on-outline" width="32"
                                    class="text-white"></iconify-icon>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#3bcbbe] transition-colors">
                                Innovation First</h4>
                            <p class="text-gray-600 leading-relaxed text-justify">Cutting-edge learning technology and
                                modern teaching
                                methods that prepare you for tomorrow's challenges.</p>
                        </div>
                    </div>

                    <div
                        class="group relative bg-white rounded-2xl p-8 shadow-sm hover:shadow-2xl transition-all duration-500 border border-[#3bcbbe]/95 hover:border-[#3bcbbe] overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-[#3bcbbe]/5 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-700">
                        </div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#3bcbbe]/30 float-slow"
                                style="animation-delay: 2s;">
                                <iconify-icon icon="fluent:people-community-24-regular" width="32"
                                    class="text-white"></iconify-icon>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#3bcbbe] transition-colors">
                                Community Driven</h4>
                            <p class="text-gray-600 leading-relaxed text-justify">Join a supportive global network of
                                learners, mentors, and industry professionals.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @role('user')
        <section class="welcome py-12 px-24 w-full bg-gray-50">
            <div class="w-full">
                <!-- Welcome Header -->
                <div
                    class="flex relative flex-col justify-center items-center bg-gradient-to-b from-[#3bcbbe] to-[#30dacc] 
                border-2 border-[#3bcbbe] rounded-3xl shadow-md py-10 px-6 gap-6 mb-12">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" viewBox="0 0 800 400">
                            <circle cx="100" cy="100" r="80" fill="white" opacity="0.5" />
                            <circle cx="700" cy="300" r="120" fill="white" opacity="0.6" />
                            <circle cx="400" cy="200" r="60" fill="white" opacity="0.4" />
                        </svg>
                    </div>
                    <!-- User Info -->
                    <div class="flex flex-col justify-center items-center gap-4">
                        <div class="relative mb-2">
                            <div
                                class="h-20 w-20 sm:h-24 sm:w-24 rounded-2xl bg-gray-100 border-2 border-white flex justify-center items-center text-2xl sm:text-3xl font-semibold shadow-sm">
                                <iconify-icon icon="si:user-fill" width="40" height="40"
                                    style="color: #3bcbbe"></iconify-icon>
                            </div>
                            <div
                                class="absolute -bottom-1 -right-1 h-6 w-6 bg-green-500 border-4 border-gray-200 shadow-md rounded-full">
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-bold text-[#ffffff] mb-2">
                                Welcome, {{ Auth::user()->name }}!
                            </h1>
                            <p class="text-sm sm:text-base lg:text-xl text-[#ffffffcf]">
                                Here's an overview of your learning journey
                            </p>
                        </div>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3 justify-center">
                        <button id="nclex"
                            class="inline-flex items-center gap-2 py-3 px-6 bg-gray-50 rounded-xl border-2 border-white text-[#29ddce] text-sm lg:text-base font-semibold hover:bg-[#99fff6] hover:text-[#29ddce] transform hover:-translate-y-0.5 transition-all duration-300">
                            <iconify-icon icon="mdi:university" width="20" height="20"
                                style="color: #29ddce"></iconify-icon>
                            NCLEX & IELTS
                        </button>

                        @if (count($activeSubscriptions) > 0)
                            <button id="open-modal"
                                class="my-subscription inline-flex items-center gap-2 py-3 px-6 bg-gray-50 border-2 border-white rounded-xl text-[#29ddce] text-sm lg:text-base font-semibold hover:bg-[#99fff6] hover:text-[#29ddce] transform hover:-translate-y-0.5 transition-all duration-300">
                                <iconify-icon icon="bxs:box" width="20" height="20"
                                    style="color: #29ddce"></iconify-icon>
                                My Subscriptions
                            </button>
                        @endif
                    </div>
                </div>

                <!-- NCLEX Modal -->
                @if ($nclex)
                    <div
                        class="hidden nclex-modal fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4 z-[100]">
                        <div class="bg-white rounded-3xl shadow-2xl max-w-5xl w-full overflow-hidden">
                            <div class="flex flex-col md:flex-row">
                                <!-- Left Side - Pricing Card -->
                                <div
                                    class="bg-gradient-to-br from-[#e6faf8] to-[#d4f5f2] p-8 md:w-1/2 border-r border-[#3bcbbe]/20">
                                    <div class="flex justify-between items-start mb-6">
                                        <h3 class="text-3xl font-bold text-[#102935]">NCLEX & IELTS</h3>
                                        <select
                                            class="currency border-2 border-[#3bcbbe] rounded-full py-2 px-7 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-[#3bcbbe] bg-white">
                                            <option value="USD" data-symbol="$">USD</option>
                                            <option value="NGN" data-symbol="₦">Naira</option>
                                            <option value="GBP" data-symbol="£">GBP</option>
                                        </select>
                                    </div>

                                    <div class="text-center my-8">
                                        <div class="inline-flex items-baseline gap-2">
                                            <span class="text-5xl font-bold text-[#3bcbbe]" id="symbol">$</span>
                                            <span class="text-7xl font-bold text-[#3bcbbe]"
                                                id="amount">{{ $nclex->price }}</span>
                                        </div>
                                    </div>

                                    <form action="{{ route('selected-plan') }}" method="post" class="space-y-4">
                                        @csrf
                                        <input type="hidden" name="currency" value="USD" class="currency-input">
                                        <input type="hidden" name="plan_id" value="{{ $nclex->id }}">
                                        <input type="hidden" name="amount" id="amount-input" value="{{ $nclex->price }}">

                                        <div class="max-w-xs mx-auto">
                                            <button type="submit"
                                                class="w-full py-4 bg-gradient-to-r from-[#50e9dd] to-[#29ddce] rounded-xl text-white text-lg font-bold hover:shadow-xl hover:shadow-[#29ddce]/40 transform hover:-translate-y-1 transition-all duration-300">
                                                Buy Now
                                            </button>
                                        </div>
                                    </form>

                                    <p class="text-center text-[#29ddce] font-semibold mt-5 text-base">
                                        Cancel anytime
                                    </p>

                                    <ul class="space-y-4 mt-8">
                                        @forelse ($nclex->points as $point)
                                            <li class="flex items-start gap-3">
                                                <div
                                                    class="flex-shrink-0 w-6 h-6 bg-[#3bcbbe] rounded-full flex items-center justify-center mt-0.5">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-gray-700 text-base leading-relaxed">{{ $point->point }}</span>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>

                                <!-- Right Side - Description -->
                                <div class="p-8 md:w-1/2 flex flex-col justify-center relative">
                                    <button onclick="document.querySelector('.nclex-modal').classList.add('hidden')"
                                        class="absolute top-4 right-4 w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>

                                    <h4 class="text-2xl font-bold text-[#102935] mb-4">Why Choose This Plan?</h4>
                                    <p class="text-gray-600 leading-relaxed text-base">
                                        Get comprehensive preparation for both NCLEX and IELTS exams. Our platform provides you
                                        with expert-designed courses, practice tests, and personalized feedback to help you
                                        succeed. Join thousands of healthcare professionals who have achieved their goals with
                                        our proven methodology.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
                    <!-- Total Enrolled Card -->
                    <div
                        class="group relative bg-white border-2 border-[#3bcbbe] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-[#3bcbbe]/15 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-[#30d5c7] to-[#3bcbbe] rounded-xl flex items-center justify-center shadow-lg">
                                    <iconify-icon icon="si:book-fill" width="25" height="25"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-700">Total Enrolled</h2>
                            </div>
                            <p class="text-5xl sm:text-6xl font-bold text-[#12b8aa]">
                                {{ count(Auth::user()->courses) }}
                            </p>
                            <p class="text-base text-gray-500 mt-2">Active courses</p>
                        </div>
                    </div>

                    <!-- Completed Card -->
                    <div
                        class="group relative bg-white border-2 border-[#3bcbbe] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-[#3bcbbe]/15 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative">
                            <div class="flex items-center gap-4 mb-4">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-[#30d5c7] to-[#3bcbbe] rounded-xl flex items-center justify-center shadow-lg">
                                    <iconify-icon icon="streamline-ultimate:check-badge-bold" width="25" height="25"
                                        style="color: #fff"></iconify-icon>
                                </div>
                                <h2 class="text-xl sm:text-2xl font-bold text-gray-700">Completed</h2>
                            </div>
                            <p class="text-5xl sm:text-6xl font-bold text-[#12b8aa]">
                                {{ count(Auth::user()->completedCourses) }}
                            </p>
                            <p class="text-base text-gray-500 mt-2">Courses finished</p>
                        </div>
                    </div>
                </div>

                <!-- Continue Courses Section -->
                @if (count(Auth::user()->continueCourses) > 0)
                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-1.5 h-8 bg-gradient-to-b from-[#30d5c7] to-[#3bcbbe] rounded-full"></div>
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl text-[#102935] font-bold uppercase">
                                Continue Courses
                            </h2>
                        </div>
                    </div>
                @endif

                <!-- Course Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse (Auth::user()->courses as $course)
                        @if ($course->course)
                            <div
                                class="group bg-white border-2 border-[#3bcbbe] rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300">
                                <a href="{{ url('courses/' . $course->course->slug) }}"
                                    class="block text-center uppercase hover:text-[#3bcbbe] text-[#102935] text-xl sm:text-2xl lg:text-3xl font-bold mb-6 transition-colors">
                                    {{ $course->course->title }}
                                </a>

                                @php
                                    $completedLessons = count($course->userLessons);
                                    $totalLessons = count($course->course->lessons);
                                    $completionPercentage =
                                        $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;
                                @endphp

                                <!-- Progress Section -->
                                <div class="mb-6">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-semibold text-gray-600">Progress</span>
                                        <span
                                            class="text-lg font-bold text-[#3bcbbe]">{{ round($completionPercentage) }}%</span>
                                    </div>
                                    <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-[#3bcbbe] to-[#28ccbe] rounded-full transition-all duration-500"
                                            style="width: {{ $completionPercentage }}%"></div>
                                    </div>
                                </div>

                                <!-- Stats -->
                                <div class="space-y-3">
                                    <div
                                        class="flex items-center justify-between p-3 border border-[#3bcbbe] bg-gray-50 rounded-lg">
                                        <span class="text-sm font-medium text-gray-600">Lessons Completed</span>
                                        <span class="text-lg font-bold text-[#102935]">
                                            {{ $completedLessons }}/{{ $totalLessons }}
                                        </span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-3 border border-[#3bcbbe] bg-gray-50 rounded-lg">
                                        <span class="text-sm font-medium text-gray-600">Quiz Score</span>
                                        <span class="text-lg font-bold text-[#102935]">
                                            {{ Auth::user()->userQuizScore($course->course_id) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-span-full text-center py-12">
                            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <p class="text-gray-500 font-medium text-lg">No courses enrolled yet</p>
                        </div>
                    @endforelse
                </div>

                <!-- Completed Courses Section -->
                @if (count(Auth::user()->completedCourses) > 0)
                    <div class="mt-16 mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-1.5 h-8 bg-gradient-to-b from-[#3bcbbe] to-[#26beb1] rounded-full"></div>
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl text-[#102935] font-bold uppercase">
                                Completed Courses
                            </h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse (Auth::user()->completedCourses as $course)
                            @if (count($course->userLessons) == count($course->course?->lessons ?? []))
                                <div
                                    class="group bg-white border-2 border-[#3bcbbe] rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] rounded-full flex items-center justify-center shadow-lg">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl sm:text-2xl lg:text-3xl text-[#102935] font-bold uppercase">
                                            {{ $course->course->title }}
                                        </h3>
                                    </div>

                                    @php
                                        $completedLessons = count($course->userLessons);
                                        $totalLessons = count($course->course->lessons);
                                    @endphp

                                    <!-- Progress Bar (100%) -->
                                    <div class="mb-6">
                                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] rounded-full"
                                                style="width: 100%"></div>
                                        </div>
                                    </div>

                                    <!-- Stats Grid -->
                                    <div class="grid grid-cols-3 gap-3">
                                        <div class="text-center p-3 border border-[#3bcbbe]/30 bg-gray-50 rounded-lg">
                                            <p class="text-xs text-gray-600 mb-1 font-medium">Lessons</p>
                                            <p class="text-lg font-bold text-[#102935]">
                                                {{ $completedLessons }}/{{ $totalLessons }}
                                            </p>
                                        </div>
                                        <div class="text-center p-3 border border-[#3bcbbe]/30 bg-gray-50 rounded-lg">
                                            <p class="text-xs text-gray-600 mb-1 font-medium">Quiz Score</p>
                                            <p class="text-lg font-bold text-[#102935]">
                                                {{ Auth::user()->userQuizScore($course->course_id) }}
                                            </p>
                                        </div>
                                        <div class="text-center p-3 border border-[#3bcbbe]/30 bg-gray-50 rounded-lg">
                                            <p class="text-xs text-gray-600 mb-1 font-medium">Exam Score</p>
                                            <p class="text-lg font-bold text-[#102935]">
                                                {{ Auth::user()->userExamScore($course->course_id) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    </div>
                @endif
            </div>
        </section>
        <section id="subscription-modal"
            class="hidden fixed inset-0 w-full bg-black/60 backdrop-blur-sm flex justify-center items-center z-[9999] p-4">
            <div class="bg-white rounded-3xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto relative">
                <div
                    class="sticky top-0 bg-gradient-to-r from-[#3bcbbe] to-[#29ddce] border-b border-gray-200 p-6 rounded-t-3xl z-10">
                    <h2 class="text-3xl font-bold text-white">My Subscriptions</h2>
                    <button id="close-modal"
                        class="absolute top-6 right-6 w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-6">
                    @foreach ($activeSubscriptions as $activeSubscription)
                        <div
                            class="border-2 border-[#3bcbbe] rounded-2xl p-6 hover:shadow-lg transition-all bg-gradient-to-br from-white to-[#3bcbbe]/5">
                            <h3 class="text-gray-800 font-bold text-2xl mb-4 flex items-center gap-2">
                                <svg class="w-6 h-6 text-[#3bcbbe] flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $activeSubscription->plan->name }}
                            </h3>
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg">
                                    <svg class="w-5 h-5 text-[#3bcbbe] flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                    </svg>
                                    <p class="text-gray-700">
                                        <span class="font-semibold">Program:</span>
                                        {{ $activeSubscription->plan->category->title ?? 'N/A' }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg">
                                    <svg class="w-5 h-5 text-[#3bcbbe] flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-gray-700">
                                        <span class="font-semibold">Start Date:</span>
                                        {{ date('d F, Y', strtotime($activeSubscription->start_at)) }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg">
                                    <svg class="w-5 h-5 text-[#3bcbbe] flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-gray-700">
                                        <span class="font-semibold">End Date:</span>
                                        {{ $activeSubscription->end_at ? date('d F, Y', strtotime($activeSubscription->end_at)) : 'Lifetime subscription' }}
                                    </p>
                                </div>
                            </div>
                            <form action="{{ route('cancel-subscription') }}" method="post">
                                @csrf
                                <input type="hidden" name="subscription_id"
                                    value="{{ $activeSubscription->user_subscription_id }}">
                                <button type="submit"
                                    class="w-full py-3 bg-gradient-to-r from-red-500 to-red-600 rounded-xl text-white text-base font-bold hover:shadow-lg hover:shadow-red-500/30 transform hover:-translate-y-0.5 transition-all duration-300">
                                    Cancel Subscription
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endrole

    <section class="py-16 px-24 w-full bg-gray-50">
        <div class="w-full ">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 border border-[#3bcbbe]/20 rounded-full">
                    Our Departments
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl text-gray-900 font-bold mt-4 mb-4">
                    Explore Our <span class="text-[#49e6d9]">Courses</span>
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#4addd1] to-[#39dbcd] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Discover courses designed to enhance your professional skills and knowledge
                </p>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($courses as $course)
                    <div
                        class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-[#3bcbbe] hover:border-[#3bcbbe]/50 hover:-translate-y-2">

                        <!-- Course Image -->
                        <div class="relative h-[18rem] overflow-hidden bg-gray-100">
                            <img src="{{ asset($course->thumbnail) }}"
                                class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="{{ $course->title }}">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
                            </div>

                            <!-- Badge Container at Bottom -->
                            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                                <!-- Lessons Badge -->
                                <div
                                    class="flex items-center gap-1.5 bg-white/95 backdrop-blur-md rounded-full px-3 py-1.5 shadow-lg">
                                    <iconify-icon icon="si:book-fill" width="15"
                                        style="color: #3bcbbe"></iconify-icon>
                                    <span class="text-xs font-bold text-gray-700">{{ count($course->lessons) }}</span>
                                </div>

                                <!-- New Badge (if course is new) -->
                                @if ($course->created_at->diffInDays(now()) <= 30)
                                    <div
                                        class="bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                        NEW
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <!-- Course Title -->
                            <a href="{{ route('course-detail', ['course' => $course->slug]) }}" class="block mb-3">
                                <h3
                                    class="text-xl font-bold text-gray-900 group-hover:text-[#3bcbbe] transition-colors duration-300 line-clamp-2 leading-tight">
                                    {{ $course->title }}
                                </h3>
                            </a>

                            <!-- Course Description -->
                            <p class="text-sm text-gray-600 line-clamp-3 mb-6 leading-relaxed">
                                {{ $course->description }}
                            </p>

                            <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

                            <!-- Enroll Button -->
                            <a href="{{ route('course-detail', ['course' => $course->slug]) }}" class="block w-full">
                                <button
                                    class="w-full py-3.5 px-6 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                                    <span>Enroll Now</span>
                                    <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <!-- Empty State Icon -->
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <p class="text-gray-500 font-semibold text-lg mb-1">No Courses Available</p>
                            <p class="text-gray-400 text-sm">New courses will be added soon. Stay tuned!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- View All Courses Button (Optional) -->
            @if ($courses->count() > 0)
                <div class="text-center mt-12">
                    <a href="#"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#3bcbbe] text-[#3bcbbe] font-semibold rounded-xl hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg">
                        <span>View All Courses</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="py-16 px-24 w-full bg-gray-50 relative overflow-hidden">

        <!-- Section Header -->
        <div class="text-center mb-10 relative z-10">
            <div class="inline-block mb-8">
                <span
                    class="text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider px-5 py-2 bg-[#3bcbbe]/10 rounded-full border border-[#3bcbbe]/20">
                    Our Learners
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-5xl text-gray-900 font-bold mb-4">
                What Our <span class="text-[#13c6b7]">Students</span> Say
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-[#40e6d8] to-[#40e1d3] mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-1">
                Discover how our platform has transformed the learning journey of professionals and students worldwide.
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="relative w-full">

            <!-- Navigation Arrows -->
            <div class=" flex justify-end gap-5 z-20 mb-8">
                <button
                    class="group w-12 h-12 rounded-full bg-white border border-[#3bcbbe] flex items-center justify-center text-[#3bcbbe] hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 transform group-hover:-translate-x-0.5 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button
                    class="group w-12 h-12 rounded-full bg-white border border-[#3bcbbe] flex items-center justify-center text-[#3bcbbe] hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Testimonial Card 1 -->
                <div
                    class="gradient-border group hover:-translate-y-2 transition-all duration-300 rounded-3xl shadow-lg hover:shadow-2xl">
                    <div class="border-2 border-[#3bcbbe]/85 bg-white p-8 rounded-3xl relative overflow-hidden">

                        <!-- Decorative Circle -->
                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#3bcbbe]/10 to-[#26beb1]/10 rounded-full blur-2xl">
                        </div>

                        <!-- Quote Icon -->
                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl  bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex items-center justify-center text-white shadow-lg ">
                                <iconify-icon icon="ri:double-quotes-r" width="30" height="30"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <!-- Rating Stars -->
                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "The courses here completely transformed my career. The content is practical, well-structured,
                            and taught by industry experts. Highly recommended for anyone serious about professional
                            growth."
                        </p>

                        <!-- Divider -->
                        <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

                        <!-- Profile -->
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://img.freepik.com/free-photo/front-view-business-woman-suit_23-2148603018.jpg?semt=ais_hybrid&w=740&q=80"
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#3bcbbe]/50"
                                    alt="Sarah Williams">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#3bcbbe] rounded-full border-4 border-white flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Sarah Williams</h4>
                                <span class="text-sm text-gray-500 font-medium">Web Development Student</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 2 -->
                <div
                    class="gradient-border group hover:-translate-y-2 transition-all duration-300 rounded-3xl shadow-lg hover:shadow-2xl">
                    <div class="border-2 border-[#3bcbbe]/85 bg-white p-8 rounded-3xl relative overflow-hidden">

                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#3bcbbe]/30 to-[#26beb1]/10 rounded-full blur-2xl">
                        </div>

                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl  bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex items-center justify-center text-white shadow-lg ">
                                <iconify-icon icon="ri:double-quotes-r" width="30" height="30"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "The courses here completely transformed my career. The content is practical, well-structured,
                            and taught by industry experts. Highly recommended for anyone serious about building real-world
                            skills."
                        </p>

                        <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://media.istockphoto.com/id/1500308602/photo/happy-black-man-mature-or-portrait-in-finance-office-about-us-company-profile-picture-or-ceo.jpg?s=612x612&w=0&k=20&c=3BWt_eT7QaaiGx4zI_K63pnntIp5Cv1qW8Pw-_bSlm8="
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#3bcbbe]/30" alt="Ahmed Khan">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#3bcbbe] rounded-full border-4 border-white flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Ahmed Khan</h4>
                                <span class="text-sm text-gray-500 font-medium">Digital Marketing Student</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 3 -->
                <div
                    class="gradient-border group hover:-translate-y-2 transition-all duration-300 rounded-3xl shadow-lg hover:shadow-2xl">
                    <div class="border-2 border-[#3bcbbe]/85 bg-white p-8 rounded-3xl relative overflow-hidden">

                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#3bcbbe]/10 to-[#26beb1]/10 rounded-full blur-2xl">
                        </div>

                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl  bg-gradient-to-br from-[#3bcbbe] to-[#26beb1] flex items-center justify-center text-white shadow-lg ">
                                <iconify-icon icon="ri:double-quotes-r" width="30" height="30"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <div class="flex gap-1 mb-4">
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                            </svg>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "The courses here completely transformed my career. The content is practical, well-structured,
                            and taught by industry experts. Highly recommended for anyone serious about advancing their
                            career."
                        </p>

                        <div class="h-px bg-gradient-to-r from-transparent via-[#3bcbbe]/80 to-transparent mb-6"></div>

                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://www.perfocal.com/blog/content/images/size/w960/2021/01/Perfocal_17-11-2019_TYWFAQ_100_standard-3.jpg"
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#3bcbbe]/30"
                                    alt="Emily Johnson">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-[#3bcbbe] rounded-full border-4 border-white flex items-center justify-center">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-lg">Emily Johnson</h4>
                                <span class="text-sm text-gray-500 font-medium">Business Management Student</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

@push('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        #subscription-modal {
            position: fixed;
            top: 0%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper(".swiper-container", {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });

            const modal = document.getElementById("subscription-modal");
            const openModalBtn = document.getElementById("open-modal");
            const closeModalBtn = document.getElementById("close-modal");

            function disableScroll() {
                document.body.style.overflow = "hidden";
            }

            function enableScroll() {
                document.body.style.overflow = "";
            }

            if (openModalBtn) {
                openModalBtn.addEventListener("click", function() {
                    modal.style.display = "flex";
                    disableScroll();
                });
            }

            if (closeModalBtn) {
                closeModalBtn.addEventListener("click", function() {
                    modal.style.display = "none";
                    enableScroll();
                });
            }

            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                    enableScroll();
                }
            });
        });

        $('#nclex').click(function(e) {
            e.preventDefault();
            $('.nclex-modal').toggleClass('hidden');
        });

        $(document).ready(function() {
            let exchangeRates = {};

            async function fetchExchangeRates() {
                try {
                    const response = await fetch(`https://api.exchangerate-api.com/v4/latest/USD`);
                    const data = await response.json();
                    exchangeRates = data.rates;
                    console.log(exchangeRates);
                } catch (error) {
                    console.error("Error fetching exchange rates:", error);
                }
            }

            fetchExchangeRates();

            $('.currency').change(function(e) {
                e.preventDefault();
                let currency = $(this).val();
                $('.currency-input').val(currency);
                let exchangeRate = exchangeRates[currency];
                let symbol = $(this).find(':selected').data('symbol');

                let amount = "{{ $nclex->price ?? 0 }}";
                let newAmount = exchangeRate * amount;
                $('#amount-input').val(newAmount);

                $('#amount').text(newAmount.toFixed(2));
                $('#symbol').text(symbol);
            });
        });
    </script>
@endpush
