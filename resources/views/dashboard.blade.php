<x-app-layout>
    <div class="py-10">
        <div class="flex justify-around flex-wrap">
            <x-dashboard-cards>
                <x-slot name="header">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hello,
                        {{ Auth::user()->name }}</h5>

                    <div
                        class="inline-flex items-center p-2 rounded-full text-gray-500 bg-gray-100 dark:bg-gray-800 dark:text-gray-200">

                        <svg class="w-8 h-8" data-darkreader-inline-stroke="" fill="none" stroke="currentColor"
                            style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </x-slot>
                <x-slot name="body">
                    <h3 class="text-base font-medium dark:text-white">Total:</h3>
                    <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        *******
                    </h6>
                </x-slot>
                <x-slot name="footer">
                    Footer text
                </x-slot>
            </x-dashboard-cards>

            <x-dashboard-cards>
                <x-slot name="header">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Fees
                        info :</h5>
                    <div
                        class="inline-flex items-center p-2 rounded-full text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200">

                        <svg class="w-8 h-8" data-darkreader-inline-stroke="" fill="none" stroke="currentColor"
                            style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </x-slot>
                <x-slot name="body">
                    <div>
                        <canvas id="doChart" class="chart-canvas" height="300px"></canvas>
                    </div>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-dashboard-cards>

            <x-last-login />
            <livewire:weather-component />
        </div>
        <div class="flex justify-around mt-5 flex-wrap">
            <div
                class="block p-6 mt-3 md:w-2/5 w-full h-full lg:h-3/6 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <div class="flex flex-wrap justify-between items-center">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Your Performance :</h5>
                    </h5>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center ml-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                        <svg class="w-5 h-5 mr-2 -ml-1" data-darkreader-inline-stroke="" fill="none"
                            stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                            </path>
                        </svg>
                        Refresh

                    </button>
                </div>
                <div>
                    <canvas id="chart-line" class="chart-canvas" height="300px"></canvas>
                </div>

            </div>
            <div class="block mb-2  mt-3 rounded-lg  drop-shadow-xl md:w-2/5 w-full h-full lg:h-3/6">
                <div id="indicators-carousel" class="relative" data-carousel="static">

                    <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-96 2xl:h-96">

                        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20"
                            data-carousel-item="active">
                            <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="...">
                        </div>

                        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
                            data-carousel-item="">
                            <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="...">
                        </div>

                        <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                            data-carousel-item="">
                            <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="...">
                        </div>

                        <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform"
                            data-carousel-item="">
                            <img src="https://flowbite.com/docs/images/carousel/carousel-4.svg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="...">
                        </div>

                        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10"
                            data-carousel-item="">
                            <img src="https://flowbite.com/docs/images/carousel/carousel-5.svg"
                                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                                alt="...">
                        </div>
                    </div>

                    <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                        <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true"
                            aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button"
                            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                            aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button"
                            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                            aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button"
                            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                            aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button"
                            class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
                            aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>

                    <button type="button"
                        class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                        data-carousel-prev="">
                        <span
                            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            <span class="hidden">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                        data-carousel-next="">
                        <span
                            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            <span class="hidden">Next</span>
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
