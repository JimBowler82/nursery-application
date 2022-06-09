<x-app-layout>
    <div class="w-1/3 mx-auto mt-28">

        <div class="mb-4 text-lg text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="flex items-center w-full">
                <label for="email" class="w-1/4">Email</label>
                <input type="email" name="email" id="email" class="w-3/4 bg-gray-200 border-none"
                    value="{{ old('email') }}" required autofocus>
            </div>

            <div class="flex items-center justify-end mt-8">
                <button type="submit"
                    class="px-8 py-4 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Email
                    Password Reset Link</button>
            </div>
        </form>
    </div>
</x-app-layout>
