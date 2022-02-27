<x-guest-layout>
    <a href="/"> Back Home </a>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <h2> Receptionist Login Page</h2>
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        @error('error')
        <h2 class="alert-danger"> {{$message}}</h2>
        @enderror
        <form method="POST" action="{{ route('receptionist.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
