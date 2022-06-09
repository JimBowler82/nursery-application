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

        <h1>Assessments Index</h1>
        <p>All completed / in progress assessments</p>

    </div>
</x-app-layout>
