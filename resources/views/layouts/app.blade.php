<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('icon.png') }}">
    <title>@yield('title')</title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Delius&display=swap" rel="stylesheet">

    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <style>
        body {
            font-family: "Outfit", sans-serif;
            /* background-color: rgb(249, 250, 251) !important; */
        }

        ::-webkit-scrollbar {
            width: 1px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Handle */
        .:-webkit-scrollbar-thumb {
            background: transparent;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: transparent;
        }
    </style>
    @stack('head')
</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex bg-gray-100 p-3">
        @include('layouts.navigation')
        <div class="flex overflow-hidden flex-col flex-1">
            @include('layouts.header')
            <main class="overflow-y-auto overflow-x-hidden flex-1 min-h-[calc(100vh-180px)]">
                <div class="border border-black/12 rounded-2xl bg-white p-8 h-full">
                    @if (isset($header))
                        <h3
                            class="mb-4 text-[22px] sm:text-[26px] md:text-[30px] xl:text-[36px] font-semibold text-[#102935]">
                            {{ $header }}
                        </h3>
                    @endif
                    {{ $slot }}
                </div>
            </main>
            @include('layouts.footer')
        </div>
    </div>

    <div id="delete-modal"
        class="h-screen hidden items-center justify-center w-full bg-black bg-opacity-15 absolute top-0 bottom-0 right-0 z-[100]">
        <div class="bg-white rounded-xl p-10 min-w-[350px] shadow-2xl">
            <form action="" id="delete-form" method="post">
                @csrf
                @method('DELETE')
                <center>
                    <div
                        class="w-20 h-20 rounded-full bg-gradient-to-t from-red-50 to-red-100 flex items-center justify-center mb-4">
                        <iconify-icon icon="weui:delete-outlined" width="50" height="50"
                            style="color: #dc2626"></iconify-icon>
                    </div>
                </center>
                <p class="mt-6 text-center">
                    Do you really want to delete this <span id="object">user</span>?
                </p>
                <div class="flex mt-5 gap-3 w-full">
                    <button type="submit"
                        class="flex-1 py-4 px-6 text-center tracking-wide bg-gradient-to-l from-[#21bbae] to-[#3bcbbe] rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-[#3bcbbe]/40 transition-all duration-200 hover:scale-105">
                        Yes
                    </button>
                    <button type="button" id="close-delete-modal"
                        class="flex-1 py-4 px-6 text-center tracking-wide bg-gradient-to-r from-red-500 to-red-600 rounded-xl text-white text-md font-semibold hover:shadow-lg hover:shadow-gray-500/40 transition-all duration-200 hover:scale-105">
                        No
                    </button>
                </div>
            </form>
        </div>
    </div>
    @stack('script')

    <script>
        $('#close-delete-modal').click(function(e) {
            e.preventDefault();
            $('#delete-modal').addClass('hidden');
            $('#delete-modal').removeClass('flex');
            $('#delete-form').attr('action', null);
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
</body>

</html>
