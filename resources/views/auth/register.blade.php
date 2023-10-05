<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="w-20 h-20 fill-current" src="{{ asset('images/dblogo.png') }}" alt="DBLogo" width="100" height="50">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            
            <!-- faculty -->
            <div class="mt-4">
                <x-label for="faculty" :value="__('Faculty')" />

                <x-input id="faculty" class="block mt-1 w-full" type="text" name="faculty" :value="old('faculty')" required />
            </div>

            <!-- departure -->
            <div class="mt-4">
                <x-label for="departure" :value="__('Departure')" />

                <x-input id="departure" class="block mt-1 w-full" type="text" name="departure" :value="old('departure')" required />
            </div>

            <!-- jobs -->
            <div class="mt-4">
                <x-label for="jobs" :value="__('Jobs')" />

                <x-input id="jobs" class="block mt-1 w-full" type="text" name="jobs" :value="old('jobs')" required />
            </div>
<!-- /////////////////////////////////////////// -->
            <!-- years -->
                <div class="mt-4">
                <x-label for="years" :value="__('Years')" />

                <x-input id="years" class="block mt-1 w-full" type="text" name="years" :value="old('years')" required />
            </div>
<!-- /////////////////////////////////////////// -->


            <!-- Email Address -->  
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
