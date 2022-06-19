@section('title', 'Sign In')
<x-guest-layout>
    <div class="bg-blue-100 w-screen flex justify-center items-center overflow-hidden">
        <div class="bg-glass m-0 lg:m-24 md:m-24 p-2 md:rounded-3xl flex flex-wrap justify-center w-3/4">
            <div class="md:w-2/4 lg:w-2/4 w-full">
                <div class="md:px-6 p-4 relative h-full">
                    <div class="row-span-2 mt-16">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />
                        <div class="text-xs text-gray-600 bg-gray-100 inline-block px-2 py-1 rounded font-bold">Khan
                        </div>
                        <h1 class="text-4xl font-bold mb-3">Sign In</h1>
                        <form method="POST" action="{{ route('login') }}" class="mt-6">
                            @csrf
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
                    <div class="md:absolute left-6 bottom-0 my-2">
                        <img alt="" class="w-8"
                            src="https://cdn-icons.flaticon.com/png/512/5436/premium/5436970.png?token=exp=1643870868~hmac=3da1c0a2eefe8eef53ffdb1216f82ee5"
                            srcset="" />
                        <div class="ml-3 text-sm  text-gray-400">&copy; 2021 - 2022 Arshad. All rights
                            reserved</div>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden md:w-2/4 lg:w-2/4 w-full">
                <img src="https://images.unsplash.com/photo-1599634875158-597d3f647df6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=675&q=80"
                      class="login_image"/>
            </div>
        </div>
    </div>
</x-guest-layout>
