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

    <div class="py-12">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="text-4xl">Hi, {{ auth()->user()->name }}.</h2>
                <p class="text-lg">Start and complete your assessments from here.</p>
            </div>

            <a href="#" class="px-12 py-4 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Start New Assessment</a>
        </div>

        <div id="assessment_container" class="flex flex-wrap mt-14">

            {{--Placeholder until real data available--}}
            @for($i = 0; $i < 8; $i++)
                <x-assessment-card />
            @endfor

            <div class="w-full mt-20">
                <p class="w-full text-center text-green-500 font-bold text-lg">Your last submitted was for Nursery Name on 3rd July.</p>
            </div>

        </div>



    </div>
</x-app-layout>
