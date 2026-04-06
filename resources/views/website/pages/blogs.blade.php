@extends('website.app')
@section('title', 'Blog')
@section('main')

    <section class="py-20 px-6 lg:px-24 w-full bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-14">
                <span
                    class="inline-block text-sm font-semibold text-[#3bcbbe] uppercase tracking-wider mb-3 px-4 py-1.5 bg-[#3bcbbe]/10 rounded-full">
                    Our Blogs
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mt-3 mb-4">
                    Latest Articles
                </h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Explore expert insights, tutorials, and updates to support your learning and professional growth.
                </p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 ">

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://anmj.org.au/wp-content/uploads/2019/07/5-tips-to-a-good-clinical-handover-web.jpg"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            Mastering Effective Communication in Professional Teams
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            Effective communication in professional teams is more than just sharing information; it is the
                            foundation of productivity and trust. This article explores practical frameworks for clear
                            handovers, structured updates, and collaborative decision-making. You will learn how to reduce
                            misunderstandings, improve accountability, and build stronger working relationships in
                            fast-paced environments.
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://assets.hillrom.com/is/image/hillrom/Article%20Featured%20Image%20-%201800%20x%20900?$knowledgeDesktop$&fmt=png-alpha"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            Recognizing Early Signs of Project Risk and Failure
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            Successful projects rarely fail suddenly. This blog explains how to identify early warning signs
                            such as scope creep, missed milestones, and communication breakdowns. We discuss proven risk
                            management techniques and how timely intervention can protect timelines, budgets, and team
                            performance.
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://nevadastate.edu/wp-content/uploads/2024/06/Addressing_Mental_Health_Crisis_among_nurses-scaled.jpg"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            Protecting Your Mental Health in High-Pressure Careers
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            The demands of modern professional life can lead to burnout if not managed intentionally. This
                            article provides evidence-based strategies for building resilience, managing stress, and
                            maintaining work-life balance. Learn practical techniques to sustain long-term performance
                            without sacrificing your well-being
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://innovationmedgroup.com/wp-content/uploads/2023/05/AdobeStock_83215124-scaled-e1685032821752-1024x684.jpeg"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            From Basics to Advanced Tools: Evolving Your Technical Skillset
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            As technology evolves rapidly, continuous learning is essential for career growth. This post
                            explores how to move from foundational tools to advanced technologies in web development,
                            design, and data. You will learn how to assess your current level and plan a structured
                            upskilling roadmap.
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://cdn.cpdonline.co.uk/wp-content/uploads/2023/03/30153612/Navigating-Difficult-Conversations-in-Health-and-Social-Care.jpg"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            Navigating Difficult Conversations in the Workplace
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            Professionals often face challenging conversations with clients, managers, and colleagues. This
                            article offers a practical guide to managing conflict, delivering constructive feedback, and
                            maintaining professionalism in high-stress situations. We focus on empathy, clarity, and
                            negotiation techniques.
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div
                    class="group bg-white rounded-2xl border border-[#3bcbbe] shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">

                    <!-- Image -->
                    <div class="relative m-4 rounded-xl overflow-hidden h-64">
                        <img src="https://media.licdn.com/dms/image/sync/v2/D5627AQEgUIbIffvEXQ/articleshare-shrink_800/articleshare-shrink_800/0/1736491009914?e=2147483647&v=beta&t=_3dO8iPWMRNo-h6yMhy9luh3LTYhP7XOirOoYWKrZ8Y"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                            alt="">
                        <span
                            class="absolute top-3 left-3 bg-[#E6F4F3] text-[#2FAFA4] text-sm font-semibold px-4 py-1 rounded-full">
                            Article
                        </span>
                        <div
                            class="image-overlay absolute top-0 right-0 left-0 w-full 
                        h-full bg-gradient-to-t from-[#3bcbbe]/60    to-transparent">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6">

                        <!-- Meta -->
                        <div class="flex items-center gap-4 text-md text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:account" width="16" style="color: #3bcbbe;"></iconify-icon>
                                Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <iconify-icon icon="mdi:clock-outline" width="16"
                                    style="color: #3bcbbe;"></iconify-icon>
                                5 min read
                            </span>
                        </div>

                        <!-- Title -->
                        <h3
                            class="text-xl font-bold text-[#102935] leading-snug mb-3 group-hover:text-[#3bcbbe] transition">
                            The Future of Work: Embracing Digital Transformation
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-600 text-md mb-6 text-justify line-clamp-3">
                            Artificial intelligence, automation, and digital platforms are reshaping how professionals work
                            and learn. This blog explores how modern tools are improving productivity, collaboration, and
                            decision-making. We discuss how adopting a tech-forward mindset can prepare you for the future
                            job market.
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between">

                            <!-- CTA -->
                            <a href=""
                                class="inline-flex items-center gap-2 bg-[#3bcbbe] text-white text-md font-semibold px-7 py-3 rounded-lg hover:bg-[#2FAFA4] transition">
                                Read Article
                                <iconify-icon icon="mdi:arrow-right" width="20"></iconify-icon>
                            </a>

                            <!-- Stats -->
                            <div class="flex items-center gap-3 text-gray-400 text-md">
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:eye-outline" width="20"></iconify-icon>
                                    1.2k
                                </span>
                                <span class="flex items-center gap-1">
                                    <iconify-icon icon="mdi:heart-outline" width="20"></iconify-icon>
                                    240
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="flex justify-center items-center" style="width: 100% !important">
                <div class="text-center mt-12">
                    <a href="#"
                        class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-[#3bcbbe] text-[#3bcbbe] font-semibold rounded-xl hover:bg-[#3bcbbe] hover:text-white transition-all duration-300 shadow-sm hover:shadow-lg">
                        <span>View All Blogs</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection
