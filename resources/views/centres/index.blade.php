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
                <h2 class="text-3xl font-bold">Setting / Centre Management</h2>
            </div>

            <a href="{{ route('centres.create') }}"
                class="px-12 py-4 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">
                Create Setting / Centre
            </a>
        </div>

        <div class="flex flex-col mt-14">

            <h3 class="mb-4 text-2xl">Centres</h3>
            <div class="flex flex-wrap">
                @foreach ($centres as $centre)
                    <x-centre-card :data="$centre" />
                @endforeach
            </div>


            <h3 class="mt-6 mb-4 text-2xl">Settings</h3>
            <div class="flex flex-wrap">
                @foreach ($settings as $setting)
                    <x-centre-card :data="$setting" />
                @endforeach
            </div>

        </div>

    </div>
</x-app-layout>
