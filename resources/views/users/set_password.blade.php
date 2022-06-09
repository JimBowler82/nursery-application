<x-app-layout>
    <div class="w-2/5 mx-auto mt-12">

        <h1 class="text-3xl mb-14">Set Password for {{ ucwords($user->name) }}</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('users.update_password', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Password -->
            <div class="flex items-center w-full mt-4">
                <label for="password" class="w-1/3">Password</label>
                <input type="password" id="password" class="w-2/3 bg-gray-200 border-none " name="password" required
                    autofocus>
            </div>

            <!-- Password Confirmation -->
            <div class="flex items-center w-full mt-4">
                <label for="password_confirmation" class="w-1/3">Password Confirmation</label>
                <input type="password" id="password_confirmation" class="w-2/3 bg-gray-200 border-none "
                    name="password_confirmation" required>
            </div>

            <!-- Button -->
            <div class="flex justify-end w-full mt-8">
                <button type="submit"
                    class="px-12 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Set
                    Password</button>
            </div>
        </form>
    </div>
</x-app-layout>
