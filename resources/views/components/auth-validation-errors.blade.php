@props(['errors'])

@if ($errors->any())
    <div id="alert-additional-content-2" class="p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
        <div class="flex items-center">
            <svg class="mr-2 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <h3 class="text-lg font-medium text-red-700 dark:text-red-800">{{ __('Whoops! Something went wrong.') }}</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-red-700 dark:text-red-800">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        <div class="flex">
            <button type="button"
                class="text-red-700 bg-transparent border border-red-700 hover:bg-red-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:border-red-800 dark:text-red-800 dark:hover:text-white"
                data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif
