@props(['active'])

@php
$classes = $active ?? false ? 'py-2 pl-3 pr-4 flex flex-col justify-center items-center text-gray-700 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 nav-active md:p-0 dark:text-gray-400 dark:hover:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent' : 'py-2 pl-3 pr-4 flex flex-col justify-center items-center text-gray-700 border-b border-gray-300 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 dark:hover:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent transition';
@endphp

<li class="text-center">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
