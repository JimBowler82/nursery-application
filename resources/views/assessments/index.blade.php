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


        <div class="flex items-center justify-between p-2 border border-gray-600 border-1">
            <div class="text-xl font-bold">
                Filter By:
            </div>

            <div class="flex justify-between">
                <select name="" id="" class="inline-block w-40 bg-gray-300 border-0 rounded-md">
                    <option value="all" disabled selected class="font-bold">Status</option>
                    <option value="all">All</option>
                    <option value="completed">Completed</option>
                    <option value="in-progress">In Progress</option>
                </select>

                <select name="" id="" class="inline-block w-40 mx-4 bg-gray-300 border-0 rounded-md">
                    <option value="" disabled selected class="font-bold">User</option>
                    <option value="">User 1</option>
                    <option value="">User 2</option>
                    <option value="">User 3</option>
                </select>

                <select name="" id="" class="inline-block w-40 bg-gray-300 border-0 rounded-md">
                    <option value="" disabled selected class="font-bold">Date</option>
                </select>
            </div>
        </div>

        <div class="mt-14">
            <h3 class="mb-2 text-xl font-bold">Completed</h3>
            <div id="assessment_container" class="flex flex-wrap gap-10">
                {{-- Placeholder until real data available --}}
                @if (count($completed) === 0)
                    <p class="ml-10">No completed assessments</p>
                @else
                    @foreach ($completed as $assessment)
                        <x-assessment-card :assessment="$assessment" :user="$assessment->user" />
                    @endforeach
                @endif

            </div>
        </div>

        <div class="mt-14">
            <h3 class="mb-2 text-xl font-bold">In Progress</h3>
            <div id="assessment_container" class="flex flex-wrap gap-10">
                {{-- Placeholder until real data available --}}
                @if (count($inProgress) === 0)
                    <p class="ml-10">No completed assessments</p>
                @else
                    @foreach ($inProgress as $assessment)
                        <x-assessment-card :assessment="$assessment" :user="$assessment->user" />
                    @endforeach
                @endif

            </div>
        </div>

    </div>
</x-app-layout>
