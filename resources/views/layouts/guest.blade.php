<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('icon.png') }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('build/assets/app-bb752bcd.css') }}">
    <script src="{{ asset('build/assets/app-02dd6d25.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: "Outfit", sans-serif;
        }

        .gradient-overlay {
            background: linear-gradient(135deg, rgba(59, 188, 190, 0.95) 0%, rgba(38, 190, 177, 0.9) 100%);
        }

        .medical-pattern {
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen w-full flex">
        <!-- Left Section - Image & Branding -->
        <div class="hidden lg:flex lg:w-[48%] relative overflow-hidden">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=2070&auto=format&fit=crop"
                    alt="Nursing Education" class="w-full h-full object-cover">
            </div>

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 gradient-overlay medical-pattern"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center justify-center w-full p-12 text-white">
                <!-- Icon/Illustration -->
                <div class="mb-8">
                    <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                        </svg>
                    </div>
                </div>

                <!-- Main Heading -->
                <h2 class="text-5xl font-bold text-center mb-4 leading-tight">
                    Empowering Future<br>Healthcare Heroes
                </h2>

                <!-- Description -->
                <p class="text-xl text-center text-white/90 max-w-lg mb-12">
                    Join thousands of nursing professionals advancing their careers through our comprehensive learning
                    platform
                </p>

                <!-- Features -->
                <div class="grid grid-cols-1 gap-4 w-full max-w-md">
                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-xl p-4">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-graduation-cap text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Expert-Led Courses</h3>
                            <p class="text-sm text-white/80">Learn from industry professionals</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-xl p-4">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-certificate text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Certified Programs</h3>
                            <p class="text-sm text-white/80">Accredited certifications</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm rounded-xl p-4">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-users text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Community Support</h3>
                            <p class="text-sm text-white/80">Connect with peers worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Section - Login Form -->
        <div class="w-full lg:w-[52%] flex items-center justify-center p-8 bg-white">
            {{ $slot }}
        </div>
    </div>

    <script>
        document.getElementById("email").addEventListener("input", function() {
            const emailInput = this.value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(emailInput)) {
                this.setCustomValidity("Please enter a valid email address with a proper domain.");
            } else {
                this.setCustomValidity("");
            }
        });

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        function togglePassword(a, id) {
            let passwordInput = document.getElementById(id);
            let status = a.getAttribute('data-status');
            passwordInput.setAttribute('type', status);
            let newStatus = status == 'text' ? 'password' : 'text';
            a.setAttribute('data-status', newStatus);

            let showIcon = "fa-eye";
            let hideIcon = "fa-eye-slash";
            let icon = document.getElementById('icon-' + id);
            if (status == 'text') {
                icon.classList.add(showIcon)
                icon.classList.remove(hideIcon)
            } else {
                icon.classList.remove(showIcon)
                icon.classList.add(hideIcon)
            }
        }
    </script>

    @session('success')
        <script>
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endsession
    @session('error')
        <script>
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endsession
</body>

</html>
