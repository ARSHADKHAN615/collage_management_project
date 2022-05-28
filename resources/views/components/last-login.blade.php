<x-dashboard-cards>
    <x-slot name="header">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Last login :
        </h5>
        <div
            class="text-red-500 bg-red-100 text-sm font-semibold inline-flex items-center p-2 rounded-full dark:bg-red-800 dark:text-red-200">
            <svg class="w-8 h-8" data-darkreader-inline-stroke="" fill="none" stroke="currentColor"
                style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                </path>
            </svg>
        </div>
    </x-slot>
    <x-slot name="body">
        <h3 class="text-base font-medium dark:text-white">From:</h3>
        <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $lastLoginFromState }},
            <br>
            {{ $lastLoginFromCountry }}
        </h6>
    </x-slot>
    <x-slot name="footer">
        <p class="font-normal text-gray-700 dark:text-gray-400"> {{ $lastLogin }}
        </p>
    </x-slot>
</x-dashboard-cards>