<x-app-layout>
    <div class="w-1/3 mx-auto mt-28">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="flex items-center w-full">
                <label for="email" class="w-1/4">Email</label>
                <input type="email" name="email" id="email" class="w-3/4 bg-gray-200 border-none"
                    value="{{ old('email', $request->email) }}" required autofocus>
            </div>

            <!-- Password -->
            <div class="flex items-center w-full mt-4">
                <label for="password" class="w-1/4">Password</label>
                <input type="password" name="password" id="password" class="w-3/4 bg-gray-200 border-none" required>
            </div>

            <!-- Confirm Password -->
            <div class="flex items-center w-full mt-4">
                <label for="password_confirmation" class="w-1/4">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-3/4 bg-gray-200 border-none" required>
            </div>

            <div class="flex items-center justify-end mt-8">
                <button type="submit"
                    class="px-8 py-4 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Reset
                    Password</button>
            </div>
        </form>
    </div>
</x-app-layout>
