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



    <div class="w-full mt-12 ">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex items-center justify-between">
            <div class="">
                <h2 class="text-3xl font-bold">User Management</h2>
            </div>

            <a href="{{ route('users.create') }}"
                class="px-12 py-4 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">
                Create New User
            </a>
        </div>

        <div class="w-full mt-14">
            <h2 class="text-2xl">Admin</h2>
            <div class="flex flex-wrap mt-6">
                @foreach ($administrators as $user)
                    <x-user-card :user="$user" />
                @endforeach
            </div>
        </div>

        <div class="w-full mt-14">
            <h2 class="text-2xl">Assessor</h2>
            <div class="flex flex-wrap mt-6">
                @foreach ($assessors as $user)
                    <x-user-card :user="$user" />
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
