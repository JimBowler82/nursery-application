<x-app-layout>
    <x-slot name="nav">
        <nav class="flex items-center justify-end w-full h-4/5">
            <a href="{{ route('home') }}"
                class="flex items-center px-8 py-2 text-black transition-colors duration-200 bg-white hover:bg-lightGreen">
                Cancel
            </a>
        </nav>
    </x-slot>

    <div class="flex items-stretch w-full mt-12">
        <!-- Session Status -->

        <div class="w-1/4 border-r border-gray-200 pr-10">

            <div>
                <ul class="flex-col items-start text-gray-600">
                    <li class="my-1 text-black font-bold active">Assessment Details</li>

                    @foreach($sidebarData as $subscale)
                        <li class="my-2">{{$subscale->number }}. {{$subscale->name}}</li>
                    @endforeach

                    <li class="my-2">6. Summary</li>

                </ul>
            </div>
        </div>


        <div class="w-full formContainer">
            <x-auth-session-status class="mb-2 ml-16" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h2 class="ml-16 text-2xl font-bold">Assessment Details</h2>

            <form action="{!! route('assessments.store') !!}" method="POST" class="flex-col w-3/5 ml-16">
                @csrf
                @method('POST')

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="centreSetting">Centre / Setting</label>
                    <select name="centre_id" id="centreSetting" class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                        <option value="" disbaled selected>Select a center /setting</option>
                        @foreach ($centres as $centre)
                            <option value="{{ $centre->id }}"
                                {{ old('centre_id') === $centre->id ? 'selected' : '' }}>{{ $centre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="date">Assessment Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date') }}"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="fromTime">Assessment Times</label>
                    <div class="flex justify-between w-2/3">
                        <input type="time" name="from_time" id="fromTime" value="{{ old('from_time') }}"
                            class="w-2/5 p-1 pl-3 bg-gray-300 border-0 rounded-md" placeholder="Start">
                        <span>To</span>
                        <input type="time" name="till_time" id="tillTime" value="{{ old('till_time') }}"
                            class="w-2/5 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                    </div>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="teachersPresent" class="align-top">Teachers Present</label>
                    <textarea name="teachers_present" id="teachersPresent" cols="30" rows="3"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">{{ old('teachers_present') }}</textarea>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="startAge">Age Range</label>
                    <div class="flex justify-between w-2/3">
                        <input type="number" min="0" name="start_age" id="startAge"
                            value="{{ old('start_age') }}" class="w-1/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                        <span>To</span>
                        <input type="number" min="0" name="end_age" id="endAge"
                            value="{{ old('end_age') }}" class="w-1/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                    </div>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="assessedQuantity" class="flex-1">Number of children in assessment group</label>
                    <input type="number" name="assessed_quantity" id="assessedQuantity"
                        value="{{ old('assessed_quantity') }}"
                        class="self-stretch w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="centreSettingQuantity" class="flex-1">Number of children in Centre / Setting</label>
                    <input type="number" name="centre_setting_quantity" id="centreSettingQuantity"
                        value="{{ old('centre_setting_quantity') }}"
                        class="self-stretch w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="notes" class="align-top">Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="3"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">{{ old('notes') }}</textarea>
                </div>

                <div class="flex justify-end w-full pt-2">
                    <button
                        class="w-2/3 px-10 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">
                        Start Assessment
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
