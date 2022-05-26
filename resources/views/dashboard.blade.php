<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="flex justify-around flex-wrap">
        <div
            class="block p-6 mt-3 md:w-1/5 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                    technology
                </h5>
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 w-10 h-10 rounded-full">
                </div>
            </div>
            <p class="font-normal text-gray-700 dark:text-gray-400">
                @role('admin')
                        You're logged in as an Admin!                        
                    @endrole
                    @role('faculty')
                        You're logged in as a Faculty!                      
                    @endrole
                    @role('student')
                        You're logged in as a Student!                        
                    @endrole
            </p>
        </div>
        <div
            class="block p-6 mt-3 md:w-1/5 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
            </p>
        </div>
        <div
            class="block p-6 mt-3 md:w-1/5 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
            </p>
        </div>
        <div
            class="block p-6 mt-3 md:w-1/5 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
            </p>
        </div>
    </div>
    <div class="flex justify-around mt-5 flex-wrap">
        <div
            class="block p-6 mt-3 md:w-2/5 w-full h-full lg:h-3/6 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    
            <div>
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                </h5>

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
                                d="M15 19l-7-7 7-7"></path>
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
    
</x-app-layout>
