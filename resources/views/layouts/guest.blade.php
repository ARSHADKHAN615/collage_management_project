<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    @livewireStyles

    @livewireScripts
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body class="bg-blue-100">

    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>



    <!-- Scripts -->
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>

</body>

</html>
