<x-app-layout>
    <x-slot name="nav">

        <nav class="flex items-center justify-end w-full h-4/5">
            @if (auth()->user()->isAdmin)
                <x-admin-nav-links />
            @else
                <x-assessor-nav-links />
            @endif

            <x-logout-button />
        </nav>

    </x-slot>

    <div class="w-1/2 mx-auto mt-12">
        <h1 class="text-3xl">Create A User</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('users.store') }}" method="POST" class="flex flex-col mt-10">
            @csrf

            <!-- Name -->
            <div class="flex items-center w-full mt-4">
                <label for="name" class="w-1/4">Name</label>
                <input type="text" id="name" class="w-3/4 bg-gray-200 border-none " name="name"
                    value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="flex items-center w-full mt-4">
                <label for="email" class="w-1/4">Email Address</label>
                <input type="email" id="email" class="w-3/4 bg-gray-200 border-none " name="email"
                    value="{{ old('email') }}" placeholder="Enter Email" required>
            </div>

            <!-- Role -->
            <div class="flex items-center w-full mt-4">
                <label for="isAdmin" class="w-1/4">Select a role</label>
                <select name="isAdmin" id="isAdmin" class="w-3/4 bg-gray-200 border-none " required>
                    <option value="1">Administrator</option>
                    <option value="0">Assessor</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end w-full mt-8">
                <button type="reset"
                    class="px-8 py-3 mr-4 transition-colors duration-200 bg-gray-200 hover:bg-yellow-200">Reset</button>
                <button type="submit"
                    class="px-12 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Create</button>
            </div>
        </form>

    </div>


</x-app-layout>
