@extends('website.app')
@section('title', 'Our Courses')
@section('main')

    <!-- Hero Section -->
    <section class="relative bg-gray-50 pt-16 px-5 lg:px-20 overflow-hidden">
        
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-8">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    Our Courses
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl text-gray-900 font-bold mb-4">
                    Explore Our <span class="text-[#3bcbbe]">Courses</span>
                </h1>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full mb-6"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Discover professional courses designed to enhance your skills and advance your career
                </p>
            </div>

            <!-- Filters Section -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mb-8">
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                    <!-- Category Filter -->
                    <div class="w-full sm:w-auto flex-1">
                        <label class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Category
                        </label>
                        <select id="category" class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] cursor-pointer transition-all text-sm shadow-sm hover:border-[#3bcbbe]/50">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Box -->
                    <div class="w-full sm:w-auto flex-1">
                        <label class="text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Search
                        </label>
                        <div class="relative">
                            <input type="text" id="search-course" placeholder="Search courses..."
                                class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 pr-10 h-12 outline-none focus:ring-2 focus:ring-[#3bcbbe] focus:border-[#3bcbbe] transition-all text-sm placeholder:text-gray-400 shadow-sm hover:border-[#3bcbbe]/50">
                            <svg class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Grid Section -->
    <section class="pt-5 pb-14 px-5 lg:px-20 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <!-- Loading Indicator -->
            <div id="loading-indicator" class="hidden text-center py-20">
                <div class="inline-block animate-spin rounded-full h-16 w-16 border-4 border-gray-200 border-t-[#3bcbbe]"></div>
                <p class="text-gray-600 mt-4 font-medium">Loading courses...</p>
            </div>

            <!-- Courses Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="course-list">
                <!-- Courses will be loaded here via AJAX -->
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-16 px-5 lg:px-20 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 border border-[#3bcbbe]/20 rounded-full">
                    Why Choose Us
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl text-gray-900 font-bold mt-3 mb-4">
                    Benefits of Our <span class="text-[#3bcbbe]">Platform</span>
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#3bcbbe]/20 to-[#26beb1]/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Instructors</h3>
                    <p class="text-gray-600 text-sm">Learn from industry professionals with years of experience</p>
                </div>

                <!-- Benefit 2 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#3bcbbe]/20 to-[#26beb1]/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Certified Courses</h3>
                    <p class="text-gray-600 text-sm">Earn recognized certificates upon course completion</p>
                </div>

                <!-- Benefit 3 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#3bcbbe]/20 to-[#26beb1]/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Flexible Learning</h3>
                    <p class="text-gray-600 text-sm">Study at your own pace, anytime and anywhere</p>
                </div>

                <!-- Benefit 4 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-gradient-to-br from-[#3bcbbe]/20 to-[#26beb1]/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-[#3bcbbe]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Community Support</h3>
                    <p class="text-gray-600 text-sm">Connect with peers & get help when you need it</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 px-5 lg:px-20 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-2">{{ $categories->count() }}+</div>
                    <p class="text-white/90 text-sm sm:text-base">Categories</p>
                </div>

                <!-- Stat 2 -->
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-2">1000+</div>
                    <p class="text-white/90 text-sm sm:text-base">Students</p>
                </div>

                <!-- Stat 3 -->
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-2">50+</div>
                    <p class="text-white/90 text-sm sm:text-base">Expert Instructors</p>
                </div>

                <!-- Stat 4 -->
                <div class="text-center">
                    <div class="text-4xl sm:text-5xl font-bold text-white mb-2">95%</div>
                    <p class="text-white/90 text-sm sm:text-base">Success Rate</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 px-5 lg:px-20 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl text-gray-900 font-bold mb-4">
                Ready to Start <span class="text-[#3bcbbe]">Learning?</span>
            </h2>
            <p class="text-gray-600 text-lg mb-8 max-w-2xl mx-auto">
                Join thousands of students already learning on our platform. Start your journey today!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#course-list" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-[#3bcbbe] to-[#26beb1] text-white font-semibold rounded-xl hover:shadow-xl hover:shadow-[#3bcbbe]/30 transition-all duration-300">
                    <span>Browse Courses</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white border-2 border-[#3bcbbe] text-[#3bcbbe] font-semibold rounded-xl hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-sm">
                    <span>Contact Us</span>
                </a>
            </div>
        </div>
    </section>

    @push('script')
        <script>
            function getCourses() {
                // Show loading indicator
                $('#loading-indicator').removeClass('hidden');
                $('#course-list').addClass('hidden');

                $.ajax({
                    type: "GET",
                    url: "{{ route('get-course') }}",
                    data: {
                        search: $('#search-course').val(),
                        category: $('#category').val()
                    },
                    success: function(response) {
                        // Hide loading indicator
                        $('#loading-indicator').addClass('hidden');
                        $('#course-list').removeClass('hidden');

                        if (response.error) {
                            console.log(response.message);
                            return;
                        }
                        $('#course-list').empty();
                        $('#course-list').append(response.html);
                    },
                    error: function() {
                        $('#loading-indicator').addClass('hidden');
                        $('#course-list').removeClass('hidden');
                        $('#course-list').html(`
                            <div class="col-span-full py-20 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-semibold text-lg mb-1">Failed to Load Courses</p>
                                    <p class="text-gray-400 text-sm">Please try again later</p>
                                </div>
                            </div>
                        `);
                    }
                });
            }

            // Initial load
            getCourses();

            // Search on keyup with debounce
            let searchTimeout;
            $('#search-course').on('keyup', function(e) {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    getCourses();
                }, 500); // 500ms debounce
            });

            // Category change
            $('#category').change(function(e) {
                e.preventDefault();
                getCourses();
            });
        </script>
    @endpush
@endsection