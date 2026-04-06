<style>
    .footer-bg {
        background: linear-gradient(135deg, #fefefe 0%, #fefefe 50%, #fefefe 100%);
        position: relative;
        overflow: hidden;
    }

    .social-icon {
        background: linear-gradient(135deg, #3bcbbe 0%, #2da89d 100%);
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(59, 188, 190, 0.3);
    }

    .footer-link {
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
    }

    .footer-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #3bcbbe;
        transition: width 0.3s ease;
    }

    .footer-link:hover::after {
        width: 100%;
    }

    .footer-link:hover {
        color: #3bcbbe;
    }

    .subscribe-btn {
        background: linear-gradient(135deg, #3bcbbe 0%, #2da89d 100%);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(59, 188, 190, 0.3);
    }

    .subscribe-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(59, 188, 190, 0.4);
    }

    .email-input {
        background: rgba(255, 255, 255, 0.05);
        /* border: 1px solid rgba(255, 255, 255, 0.1); */
        transition: all 0.3s ease;
    }

    .email-input:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #3bcbbe;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 188, 190, 0.1);
    }

    .contact-item {
        transition: all 0.3s ease;
    }

    .contact-item:hover {
        color: #3bcbbe;
    }

    .contact-item svg {
        transition: all 0.3s ease;
    }

    .contact-item:hover svg path {
        fill: #3bcbbe;
    }

    .logo-container {
        filter: drop-shadow(0 0 20px rgba(59, 188, 190, 0.2));
    }
</style>

<footer class="footer-bg w-full border-t border-[#3bcbbe]">
    <div class="container mx-auto px-5 sm:px-8 lg:px-20 py-12 relative z-10">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-8">

            <!-- Brand Section -->
            <div class="space-y-6">
                <div class="logo-container h-24">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('logo.png') }}" alt="" class="h-[100%]" srcset="">
                    </a>
                </div>

                <p class="text-gray-700 text-md font-medium leading-relaxed text-justify hidden sm:block">
                    Empowering data scientists with cutting edge machine learning and predictive analytics. Transform your career with Ai led departments.
                </p>

                <!-- Social Media Icons -->
                <div class="flex space-x-3">
                    <a href="#"
                        class="social-icon w-11 h-11 bg-white rounded-full flex justify-center items-center ">
                        <iconify-icon icon="ri:whatsapp-fill" width="22" height="22"
                            style="color: rgb(255, 255, 255)"></iconify-icon>
                    </a>
                    <a href="#" class="social-icon w-11 h-11 rounded-full flex justify-center items-center">
                        <iconify-icon icon="mdi:facebook" width="22" height="22"
                            style="color: rgb(255, 255, 255)"></iconify-icon>
                    </a>
                    <a href="#" class="social-icon w-11 h-11 rounded-full flex justify-center items-center">
                        <iconify-icon icon="basil:instagram-solid" width="22" height="22"
                            style="color: rgb(255, 255, 255)"></iconify-icon>
                    </a>
                    <a href="#" class="social-icon w-11 h-11 rounded-full flex justify-center items-center">
                        <iconify-icon icon="ri:linkedin-fill" width="22" height="22"
                            style="color: rgb(255, 255, 255)"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="mt-2 ml-10">
                <h3 class="text-2xl font-semibold mb-3" style="color: #3bcbbe;">Quick Links</h3>
                <ul class="space-y-4 ml-1">
                    <li><a href="/" class="footer-link text-gray-700 font-medium text-md">Home</a></li>
                    <li><a href="/courses" class="footer-link text-gray-700 font-medium text-md">Courses</a></li>
                    <li><a href="/about" class="footer-link text-gray-700 font-medium text-md">About Us</a></li>
                    <li><a href="/programs" class="footer-link text-gray-700 font-medium text-md">Portfolio</a></li>
                    <li><a href="/pricing" class="footer-link text-gray-700 font-medium text-md">Pricing</a></li>
                </ul>
            </div>

            <!-- For You / Services -->
            <div class="mt-2 ml-4">
                <h3 class="text-2xl font-semibold mb-3" style="color: #3bcbbe;">For You</h3>
                <ul class="space-y-4 ml-1">
                    <li><a href="/programs" class="footer-link text-gray-700 font-medium text-md">Our Departments</a></li>
                    <li><a href="/clinical-training" class="footer-link text-gray-700 font-medium text-md">Professional Trainers</a></li>
                    <li><a href="/certifications"
                            class="footer-link text-gray-700 font-medium text-md">Certifications</a>
                    </li>
                    <li><a href="/consultation" class="footer-link text-gray-700 font-medium text-md">Consultation</a>
                    </li>
                    <li><a href="/disclaimer" class="footer-link text-gray-700 font-medium text-md">Disclaimer</a></li>
                </ul>
            </div>

            <!-- Contact & Newsletter -->
            <div class="mt-2 -ml-10">
                <h3 class="text-2xl font-semibold mb-3" style="color: #3bcbbe;">Stay Connected</h3>

                <!-- Newsletter -->
                <div class="mb-6">
                    <p class="text-gray-700 text-md mb-4">Subscribe to our newsletter for updates and
                        exclusive content.</p>
                    <div class="flex flex-col space-y-3">
                        <input type="email" placeholder="Enter your email"
                            class="email-input px-4 py-3.5 border border-[#3bcbbe] rounded-lg text-gray-600 text-md placeholder-gray-500" />
                        <button class="subscribe-btn px-6 py-3.5 rounded-lg font-semibold text-white text-md">
                            Subscribe Now
                        </button>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="space-y-3">
                    <a href="mailto:admin@clinedlearninghub.net"
                        class="contact-item flex items-center space-x-2 text-[#3bcbbe] font-medium text-md group">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="flex-shrink-0"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"
                                fill="#3bcbbe" />
                        </svg>
                        <span>bytecloude@learninghub.net</span>
                    </a>

                    <a href="https://wa.me/2348167506755" target="_blank"
                        class="contact-item flex items-center space-x-2 text-[#3bcbbe] font-medium text-md group">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="flex-shrink-0"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.6 6.31999C16.8669 5.58141 15.9943 4.99596 15.033 4.59767C14.0716 4.19938 13.0406 3.99622 12 3.99999C10.6089 4.00135 9.24248 4.36819 8.03771 5.06377C6.83294 5.75935 5.83208 6.75926 5.13534 7.96335C4.4386 9.16745 4.07046 10.5335 4.06776 11.9246C4.06507 13.3158 4.42793 14.6832 5.12 15.89L4 20L8.2 18.9C9.35975 19.5452 10.6629 19.8891 11.99 19.9C14.0997 19.9001 16.124 19.0668 17.6222 17.5816C19.1205 16.0965 19.9715 14.0796 19.99 11.97C19.983 10.9173 19.7682 9.87634 19.3581 8.9068C18.948 7.93725 18.3505 7.05819 17.6 6.31999ZM12 18.53C10.8177 18.5308 9.65701 18.213 8.64 17.61L8.4 17.46L5.91 18.12L6.57 15.69L6.41 15.44C5.55925 14.0667 5.24174 12.429 5.51762 10.8372C5.7935 9.24545 6.64361 7.81015 7.9069 6.80322C9.1702 5.79628 10.7589 5.28765 12.3721 5.37368C13.9853 5.4597 15.511 6.13441 16.66 7.26999C17.916 8.49818 18.635 10.1735 18.66 11.93C18.6442 13.6859 17.9355 15.3645 16.6882 16.6006C15.441 17.8366 13.756 18.5301 12 18.53ZM15.61 13.59C15.41 13.49 14.44 13.01 14.26 12.95C14.08 12.89 13.94 12.85 13.81 13.05C13.6144 13.3181 13.404 13.5751 13.18 13.82C13.07 13.96 12.95 13.97 12.75 13.82C11.6097 13.3694 10.6597 12.5394 10.06 11.47C9.85 11.12 10.26 11.14 10.64 10.39C10.6681 10.3359 10.6827 10.2759 10.6827 10.215C10.6827 10.1541 10.6681 10.0941 10.64 10.04C10.64 9.93999 10.19 8.95999 10.03 8.56999C9.87 8.17999 9.71 8.23999 9.58 8.22999H9.19C9.08895 8.23154 8.9894 8.25465 8.898 8.29776C8.8066 8.34087 8.72546 8.403 8.66 8.47999C8.43562 8.69817 8.26061 8.96191 8.14676 9.25343C8.03291 9.54495 7.98287 9.85749 8 10.17C8.0627 10.9181 8.34443 11.6311 8.81 12.22C9.6622 13.4958 10.8301 14.5293 12.2 15.22C12.9185 15.6394 13.7535 15.8148 14.58 15.72C14.8552 15.6654 15.1159 15.5535 15.345 15.3915C15.5742 15.2296 15.7667 15.0212 15.91 14.78C16.0428 14.4856 16.0846 14.1583 16.03 13.84C15.94 13.74 15.81 13.69 15.61 13.59Z"
                                fill="#3bcbbe" />
                        </svg>
                        <span>+92 3356343882</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-[#3bcbbe] pt-6 mt-8">
            <div
                class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 text-center sm:text-left">
                <p class="text-gray-500 text-md font-medium">
                    Copyright © 2025 <span class="font-medium" style="color: #3bcbbe;">@clinedlearninghub</span>. All
                    Rights Reserved
                </p>

                <div class="flex items-center space-x-2">
                    <a href="/privacy-policy"
                        class="text-gray-600 font-medium text-md hover:text-[#3bcbbe] transition-colors border-r border-gray-600 pr-2">Privacy
                        Policy</a>
                    <a href="/terms-and-conditions"
                        class="text-gray-600 font-medium text-md hover:text-[#3bcbbe] transition-colors border-r border-gray-600 px-2">Terms
                        & Conditions</a>
                    <a href="/disclaimer"
                        class="text-gray-600 font-medium text-md hover:text-[#3bcbbe] transition-colors pl-2">Disclaimer</a>
                </div>
            </div>
        </div>
    </div>
</footer>
