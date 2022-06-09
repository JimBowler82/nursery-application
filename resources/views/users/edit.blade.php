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
        <h1 class="text-3xl">Edit {{ $user->id === auth()->id() ? 'Your Account' : 'User' }}</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h2 class="mt-10 text-2xl">{{ ucwords($user->name) }}</h2>

        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" class="flex flex-col mt-5"
            id="update-form">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="flex items-center w-full mt-4">
                <label for="name" class="w-1/4">Name</label>
                <input type="text" id="name" class="w-3/4 bg-gray-200 border-none " name="name"
                    value="{{ $user->name }}" placeholder="Enter Name" required autofocus>
            </div>

            <!-- Email Address -->
            <div class="flex items-center w-full mt-4">
                <label for="email" class="w-1/4">Email Address</label>
                <input type="email" id="email" class="w-3/4 bg-gray-200 border-none " name="email"
                    value="{{ $user->email }}" placeholder="Enter Email" required>
            </div>

            <!-- Role -->
            <div class="flex items-center w-full mt-4">
                <label for="isAdmin" class="w-1/4">Select a role</label>
                <select name="isAdmin" id="isAdmin" class="w-3/4 bg-gray-200 border-none " required
                    {{ auth()->user()->isAdmin  ? '' : 'disabled' }}>
                    <option value="1" {{ $user->isAdmin ? 'selected' : '' }}>Administrator</option>
                    <option value="0" {{ !$user->isAdmin ? 'selected' : '' }}>Assessor</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end w-full mt-8">

                @if (auth()->user()->isAdmin)
                    <button type="button" id="delete-btn"
                        class="px-8 py-3 mr-4 transition-colors duration-200 bg-gray-200 hover:bg-red-500">
                        Delete Account
                    </button>
                @endif


                <button type="submit" form="update-form"
                    class="px-12 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Save</button>
            </div>
        </form>

        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <input type="hidden" value="">
        </form>

    </div>

    @push('scripts')
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', () => {
                const deleteForm = document.getElementById('delete-form');
                const deleteBtn = document.getElementById('delete-btn');

                deleteBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete?')) {
                        deleteForm.submit();
                    }
                })
            });
        </script>
    @endpush

</x-app-layout>
