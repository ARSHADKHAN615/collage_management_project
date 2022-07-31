@section('title', 'Sign In')
<x-guest-layout>
    <div class="flex items-center justify-center w-full overflow-hidden bg-blue-100">
        <div class="flex flex-wrap justify-center p-2 m-4 bg-glass lg:m-24 md:m-24 rounded-3xl md:w-3/4">
            <div class="w-full md:w-2/4 lg:w-2/4">
                <div class="flex flex-col justify-between h-full p-4 md:px-6">
                    <div class="row-span-2 mt-16">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />
                        <div class="inline-block px-2 py-1 text-xs font-bold text-gray-600 bg-gray-100 rounded">Khan
                        </div>
                        <h1 class="mb-3 text-4xl font-bold">Sign In</h1>
                        <form method="POST" action="{{ route('login') }}" class="mt-6">
                            @csrf
                            <div class="flex flex-wrap my-4">
                                <div class="flex items-center ml-8 mr-4">
                                    <h1 class="text-base font-semibold">As :</h1>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="red-radio" type="radio" value="admin" name="role_radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="red-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="orange-radio" type="radio" value="faculty" name="role_radio" class="w-4 h-4 text-orange-500 bg-gray-100 border-gray-300 focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="orange-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Faculty</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="green-radio" type="radio" value="student" name="role_radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Student</label>
                                </div>
                            </div>
                            <div class="mb-6">
                                <x-label for="email" :value="__('Your Email')" />
                                <x-input id="email" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="mb-6">
                                <x-label for="password" :value="__('Your Password')" />
                                <x-input type="password" id="password" name="password" required />
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="remember_me" type="checkbox" name="remember"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                </div>
                                <label for="remember"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                                    me</label>
                            </div>

                            <div class="flex items-center justify-end my-1">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                            <x-button>
                                {{ __('Sign In') }}
                            </x-button>
                        </form>
                    </div>
                    <div class="mt-10">
                        <img alt="" class="w-8"
                            src="https://cdn-icons.flaticon.com/png/512/5436/premium/5436970.png?token=exp=1643870868~hmac=3da1c0a2eefe8eef53ffdb1216f82ee5"
                            srcset="" />
                        <div class="ml-3 text-sm text-gray-400">&copy; 2021 - 2022 Arshad. All rights
                            reserved</div>
                    </div>
                </div>
            </div>
            <div class="w-full overflow-hidden rounded-2xl md:w-2/4 lg:w-2/4 bg-login-img">

            </div>
        </div>
    </div>
</x-guest-layout>
