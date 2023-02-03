{{-- @section('title', 'Welcome back, ' . Auth::user()->name) --}}
<x-app-layout>
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="flex justify-center col-md-6 offset-3 col-md-offset-6">
                    <div
                        class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <form class="space-y-6" action="{{ route('razorpay.payment.store') }}" method="POST"
                            id="pay-fees-form">
                            @csrf

                            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Payment Details</h5>
                            <div class="grid items-center gap-3 mb-6 md:grid-cols-2">
                                <label for="fees"
                                    class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total Fees payable
                                    :</label>
                                    <div>
                                        <div class="flex">
                                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                ₹
                                            </span>
                                            <input type="number" name="fees" id="fees" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Total Fees" required="">
                                          </div>
                                    </div>
                            </div>
                            <div class="grid items-center gap-3 mb-6 md:grid-cols-2">
                                <la for="penalty" class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Total Penalty payable :</la>
                                {{-- <input type="number" name="penalty" id="penalty"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Total Fees" required=""> --}}
                                <span data-penalty="500">+₹500</span>
                            </div>
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_y0qsqFcUnrGv21" data-amount="50000"
                                data-buttontext="Pay ₹500 INR" data-name="R.B. Institute of Technology" data-description="R.B. Institute of Technology"
                                data-image="{{ asset('images/RBIMS-LOGO.png') }}" data-prefill.name="name" data-prefill.email="email"
                                data-theme.color="#ff7529"></script>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </main>
    @prepend('scripts')
        <script>
            // change the total amount to change fees felid javascript
            document.getElementById('fees').addEventListener('change', function() {
                var amount = document.getElementById('fees').value;
                // add the penalty amount to the total amount
                var penalty = document.querySelector('[data-penalty]').getAttribute('data-penalty');
                var totalSet = (amount * 100) + (penalty * 100);
                var totalShow = parseInt(amount) + parseInt(penalty)


                var script = document.createElement('script');
                script.src = "https://checkout.razorpay.com/v1/checkout.js";
                script.setAttribute('data-key', 'rzp_test_y0qsqFcUnrGv21');
                script.setAttribute('data-amount', totalSet);
                script.setAttribute('data-buttontext', 'Pay ₹' + totalShow + ' INR');
                script.setAttribute('data-name', 'R.B. Institute of Technology');
                script.setAttribute('data-description', 'R.B. Institute of Technology');
                script.setAttribute('data-image', "{{ asset('images/RBIMS-LOGO.png') }}");
                script.setAttribute('data-prefill.name', 'name');
                script.setAttribute('data-prefill.email', 'email');
                script.setAttribute('data-theme.color', '#ff7529');
                // remove and add script
                console.log(document.getElementById('pay-fees-form').removeChild(document.getElementById(
                    'pay-fees-form').lastChild));
                console.log(document.getElementById('pay-fees-form').removeChild(document.getElementById(
                    'pay-fees-form').lastChild));
                document.getElementById('pay-fees-form').appendChild(script);
            });
        </script>
    @endprepend
</x-app-layout>
