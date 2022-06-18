@section('title', '403')
<x-guest-layout>
    <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_6wvpi7jz.json"  background="transparent"  speed="1"  style="width: 100%; height: 60vw;"  loop  autoplay></lottie-player>
    <div class="flex justify-center">
        <a href="{{ route('dashboard') }}">
            <button type="button"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Go
                to Homepage</button>
        </a>
    </div>
</x-guest-layout>
