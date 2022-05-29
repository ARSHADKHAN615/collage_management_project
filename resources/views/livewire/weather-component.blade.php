@push('styles')
    <style>
        .myAnim {

            animation: myAnim 12s ease 0s infinite normal forwards;
        }

        @keyframes myAnim {
            0% {
                transform: translate(0);
            }

            10% {
                transform: translate(-2px, -2px);
            }

            20% {
                transform: translate(2px, -2px);
            }

            30% {
                transform: translate(-2px, 2px);
            }

            40% {
                transform: translate(2px, 2px);
            }

            50% {
                transform: translate(-2px, -2px);
            }

            60% {
                transform: translate(2px, -2px);
            }

            70% {
                transform: translate(-2px, 2px);
            }

            80% {
                transform: translate(-2px, -2px);
            }

            90% {
                transform: translate(2px, -2px);
            }

            100% {
                transform: translate(0);
            }
        }

    </style>
@endpush
<div
    class="flex flex-col justify-between  p-6 mt-3 md:w-1/5 font-Poppins bg-white rounded-lg border border-gray-200 drop-shadow-xl  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

    <div class="flex justify-between items-center">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Today :</h5>
        <div
            class="inline-flex items-center p-2 rounded-full text-blue-500 bg-blue-100 dark:bg-blue-800 dark:text-blue-200">

            <svg class="w-8 h-8" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
    </div>
    <div class="flex flex-wrap xl:flex-nowrap">
        {{$clientIP}}
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $locationName }}
            <br />
            {{ $Temp }} <sup>&deg;C</sup>
        </h5>
        <img src="{{ $image }}" alt="{{ $locationName }}" class="myAnim">
    </div>

    <div>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $localtime }}
        </p>
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mt-4 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            wire:click="updateWeather">

            <div wire:loading>
                <svg role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="#E5E7EB" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentColor" />
                </svg>
                Loading...
            </div>

            <div wire:loading.remove class="inline-flex items-center">
                <svg class="w-5 h-5 mr-2 -ml-1" data-darkreader-inline-stroke="" fill="none" stroke="currentColor"
                    style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                    </path>
                </svg>
                Refresh
            </div>

        </button>
    </div>

</div>



@push('scripts')
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
            toastEl.innerHTML = `<x-toast-alert type="${type}" message="${message}"/>`;
            toastBox.appendChild(toastEl);
            setTimeout(() => {
                toastBox.removeChild(toastEl);
            }, 3000);

        });
    </script>
@endpush
