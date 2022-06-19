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
                    
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="mb-6">
                                <x-label for="email" :value="__('Your Email')" />
                                <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required />
                            </div>                            
                            <div class="mb-6">
                                <x-label for="password" :value="__('Your Password')" />
                                <x-input type="password" id="password" name="password" required />
                            </div>
                            <div class="mb-6">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input type="password" id="password_confirmation" name="password_confirmation" required />
                            </div>
                            <x-button>
                                {{ __('Reset Password') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
