<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('icon.png') }}">
    <title>@yield('title', 'ClinEd Learning Hub')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <style>
        *{
            font-family: "Outfit", sans-serif !important;
        }
        
        .swiper-slide>p {
            min-height: 100px
        }

        .swiper-slide {
            height: -webkit-fill-available !important;
        }
    </style>
    @stack('head')
</head>

<body>
    @include('website.layout.header')
    <main>
        @yield('main')
    </main>
    @include('website.layout.footer')
    @stack('script')
    <script>
        let Toast = Swal.mixin({
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
        @session('success')
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
        @endsession
        @session('error')
        Toast.fire({
            icon: "error",
            title: "{{ session('error') }}"
        });
        @endsession
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('[data-collapse-toggle="navbar-cta"]');
            const navbarMenu = document.getElementById('navbar-cta');

            toggleButton.addEventListener('click', function() {
                const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
                toggleButton.setAttribute('aria-expanded', !isExpanded);
                navbarMenu.classList.toggle('hidden');
            });


            // const dropdownButton = document.getElementById("subscriptionsDropdownButton");
            const dropdownMenu = document.getElementById("subscriptionsDropdownMenu");

            // dropdownButton.addEventListener("click", function(event) {
            //     event.stopPropagation(); // Prevent clicking outside from closing immediately
            //     dropdownMenu.classList.toggle("hidden");
            // });

            // document.addEventListener("click", function(event) {
            //     if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            //         dropdownMenu.classList.add("hidden");
            //     }
            // });
        });
        document.getElementById('notificationButton').addEventListener('click', function() {
            let dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            if (!document.getElementById('notificationButton').contains(e.target) &&
                !document.getElementById('notificationDropdown').contains(e.target)) {
                document.getElementById('notificationDropdown').classList.add('hidden');
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ url('get-notifications') }}",
            success: function(response) {
                console.log(response);
                let notifications = response.notifications
                $("#notificationCount").text(response.unreadCount);
                notifications.forEach(notification => {
                    let not = `<a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 border-b">
                                    <p class="text-black font-bold">${ notification['title']}</p>
                                    <p class="text-gray-700">${ notification['description']}</p>
                                    <p class="text-xs text-gray-500 text-right">${ notification['date']}</p>
                                </a>`;
                    $("#notification-list").append(not);
                });

            }
        });
    </script>
</body>

</html>
