<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')

    @livewireScripts
    {{-- Dark mode script --}}
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-sans antialiased body-bg ">
    <div class="toast_box" id="toast-main-box"></div>
    @include('layouts.navigation')

    {{-- Page Content --}}
    <div class="h-full m-0 shadow-xl lg:m-10 md:m-9 dash-board-glass dark:bg-slate-700 md:rounded-3xl">
            {{ $slot }}
    </div>
    <footer class="p-4 bg-white shadow md:px-6 md:py-8 dark:bg-gray-800">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center mb-4 sm:mb-0">
                <img src="{{ asset('images/RBIMS-LOGO.png') }}" class="mr-3 h-14" alt="Flowbite Logo">
                {{-- <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white font-Rubik">Arshad</span> --}}
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a
                href="http://arshadkhan.me" class="hover:underline">Arshad</a>. All Rights Reserved.
        </span>
    </footer>

    {{-- Scripts --}}
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/driver.js/dist/driver.min.js"></script>
    <script>
        const toastBox = document.querySelector('.toast_box');
        window.addEventListener('toast', function({
            detail: {
                type,
                message,
                icon,
            }
        }) {
            const toastEl = document.createElement('div');
            console.log(type);
            toastEl.innerHTML = `<x-toast-alert type="${type}" icon="${icon}" message="${message}"/>`;
            toastEl.classList.add('toast-box');
            toastBox.appendChild(toastEl);
            setTimeout(() => {
                toastEl.classList.add('opacity-0');
            }, 5000);
            setTimeout(() => {
                toastEl.remove();
            }, 6000);
        });
        function closeBtn(e) {
            e.parentElement.parentElement.remove();
        }
    </script>
    @stack('scripts')

    @livewire('notifications')
</body>

</html>
