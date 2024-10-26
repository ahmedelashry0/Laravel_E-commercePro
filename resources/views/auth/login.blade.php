<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-end mt-4 bg-gray-100 p-4 rounded">
                <a href="{{ route('google.login') }}" class="btn btn-outline-primary ms-2">
                    <svg class="inline-block mr-2" width="18" height="18" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M24 9.5c3.14 0 5.96 1.21 8.11 3.41l6.07-6.07C34.65 3.09 29.58 0.5 24 0.5 14.68 0.5 6.73 5.85 3.66 13.4l7.34 5.69C13.48 14.61 18.37 9.5 24 9.5z"/>
                        <path fill="#34A853" d="M46.27 24.5c0-1.54-.14-3.03-.4-4.5H24v9.5h12.49c-.53 2.66-2.04 4.9-4.14 6.38l6.63 5.15c3.94-3.63 6.29-8.98 6.29-16.53z"/>
                        <path fill="#FBBC05" d="M11 29.09l-7.34 5.69C5.68 41.86 14.68 47.5 24 47.5c5.58 0 10.65-1.91 14.27-5.27l-6.63-5.15c-2.04 1.46-4.59 2.42-7.64 2.42-6.03 0-11.12-4.08-12.98-9.61z"/>
                        <path fill="#EA4335" d="M11 29.09l-7.34 5.69C2.7 32.92 0 28.92 0 24 0 19.08 2.7 15.08 6.98 12.72l7.34 5.69C12.89 22.93 12.08 23.93 11 29.09z"/>
                    </svg>
                    Sign in with Google
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
