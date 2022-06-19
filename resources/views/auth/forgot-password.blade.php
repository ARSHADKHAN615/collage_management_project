<x-guest-layout>
    <div class="bg-blue-100 w-screen flex justify-center items-center overflow-hidden h-screen">
        <div class="bg-glass m-4 md:m-24 p-2 rounded-3xl md:w-3/6 w-full">
            <div class="p-3 mb-6 md:mb-0 md:w-full">
                <div class="h-full">
                    <div class="row-span-2 mt-2">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-6">
                                <x-label for="email" :value="__('Your Email')" />
                                <x-input id="email" type="email" name="email" :value="old('email')" required />
                            </div>
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
