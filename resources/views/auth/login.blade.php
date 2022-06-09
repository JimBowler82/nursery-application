<x-app-layout>
    <div class="w-1/3 mx-auto mt-28">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="flex-col ">
            @csrf

            <!-- Email Address -->
            <div class="flex items-center w-full">
                <label for="email" class="w-1/4">Email Address</label>
                <input type="email" id="email" class="w-3/4 bg-gray-200 border-none " name="email"
                    value="{{ old('email') }}" placeholder="Enter Email" required autofocus>
            </div>

            <!-- Password -->
            <div class="flex items-center w-full mt-4">
                <label for="password" class="w-1/4">Password</label>
                <input type="password" id="password" class="w-3/4 bg-gray-200 border-none" name="password"
                    placeholder="Enter Password" required autocomplete="current-password">
            </div>



            <div class="flex items-center justify-between w-3/4 mt-8 ml-auto mr-0">
                <!-- Remember Me -->
                <div class="block mr-12">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="border-gray-300 rounded shadow-sm text-darkGreen focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <button type="submit"
                    class="px-10 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">LOG
                    IN</button>
            </div>

            @if (Route::has('password.request'))
                <a class="inline-block w-full text-sm text-center text-gray-600 underline hover:text-gray-900"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </form>
    </div>



</x-app-layout>
