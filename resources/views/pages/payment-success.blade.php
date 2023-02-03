<x-app-layout>
    <div class="flex justify-center">

        <div class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center justify-center">
                <div class="text-xl font-medium text-gray-900 dark:text-white">Payment Successful</div>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_vuliyhde.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            </div>
            {{-- payment details --}}
            <div>
            {{-- <div class="text-xl font-medium text-gray-900 dark:text-white">Payment id: {{$response->id}}</div>
            <div class="text-xl font-medium text-gray-900 dark:text-white">Amount {{$response->amount/100}}</div> --}}
            <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                <div>Payment id:</div>
                <div>{{$response->id}}</div>
            </div>
            <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                <div>Amount :</div>
                <div>₹{{$response->amount/100}}</div>
            </div>
            <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                <div>Method :</div>
                <div>{{$response->method}}</div>
            </div>
            <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                <div>Payment Status :</div>
                <div>Success</div>
            </div>
            <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                <div>Payment Date :</div>
                <div>{{Carbon\CarbonInterval::seconds($response->created_at)}}</div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
