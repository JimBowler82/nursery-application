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
        <h1 class="text-3xl">Create A Setting / Centre</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('centres.store') }}" method="POST" class="flex flex-col mt-10">
            @csrf

            <!-- Name -->
            <div class="flex items-center w-full mt-4">
                <label for="name" class="w-1/4">Name</label>
                <input type="text" id="name" class="w-3/4 bg-gray-200 border-none " name="name"
                       value="{{ old('name') }}" placeholder="Enter Name of Setting / Centre" required autofocus>
            </div>

            <!-- Setting / Centre type -->
            <div class="flex items-center w-full mt-4">
                <label for="type" class="w-1/4">Type <small>(Setting or Centre)</small></label>
                <select name="type" id="type" class="w-3/4 bg-gray-200 border-none " required>
                    <option value="centre">Centre</option>
                    <option value="setting">Setting</option>
                </select>
            </div>

            <!-- Description -->
            <div class="flex items-center w-full mt-4">
                <label for="description" class="w-1/4 self-start">Description</label>
                <textarea
                    name="description"
                    id="description"
                    cols="30"
                    rows="5"
                    placeholder="Optional description ..."
                    class="w-3/4 bg-gray-200 border-none ">{{ old('description') }}</textarea>
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
