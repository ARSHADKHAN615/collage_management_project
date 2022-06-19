<x-guest-layout>
    <div class="bg-blue-100 w-screen flex justify-center items-center overflow-hidden h-screen">
        <div class="bg-glass md:m-24 m-2 p-2 rounded-3xl md:w-3/6 w-full">
            <div class="p-3 mb-6 md:mb-0 md:w-full">
                <div class="h-full">
                    <div class="row-span-2 mt-2">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors :errors="$errors" />
                    
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-6">
                                <x-label for="name" :value="__('Your Name')" />
                                <x-input type="text" id="name" name="name" :value="old('name')" required />
                            </div>                            
                            <div class="mb-6">
                                <x-label for="email" :value="__('Your Email')" />
                                <x-input id="email" type="email" name="email" :value="old('email')" required />
                            </div>                            
                            <div class="mb-6">
                                <x-label for="password" :value="__('Your Password')" />
                                <x-input type="password" id="password" name="password" required />
                            </div>
                            <div class="mb-6">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input type="password" id="password_confirmation" name="password_confirmation" required />
                            </div>                
                            <div class="flex items-center justify-end my-2">
                                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                            <x-button>
                                {{ __('Register') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
