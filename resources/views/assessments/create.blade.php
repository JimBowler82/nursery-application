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

        <div class="w-1/4 border-r border-gray-200 l progress">

            <div>
                <ul class="flex-col items-start text-gray-600">
                    <li class="my-1 font-black active">Assessment Details</li>
                    <li class="my-1">1. Section One</li>
                    <li class="my-1">2. Section Two</li>
                    <li class="my-1">3. Section Three</li>
                    <li class="my-1">4. Section Four</li>
                    <li class="my-1">5. Section Five</li>
                    <li class="my-1">6. Section Six</li>
                    <li class="my-1">7. Section Seven</li>
                    <li class="my-1">8. Section Eight</li>
                    <li class="my-1">9. Section Nine</li>
                    <li class="my-1">10.Section Ten</li>
                    <li class="my-1">11. Section Eleven</li>
                </ul>
            </div>
        </div>


        <div class="w-full formContainer">
            <x-auth-session-status class="mb-2 ml-16" :status="session('status')" />

            <h2 class="ml-16 text-2xl font-bold">Assessment Details</h2>

            <form action="" class="flex-col w-3/5 ml-16">
                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="centreSetting">Centre / Setting</label>
                    <select name="centreSetting" id="centreSetting"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                        <option value="" disbaled selected>Select a center /setting</option>
                    </select>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="date">Assessment Date</label>
                    <input type="date" name="date" id="date"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="fromTime">Assessment Times</label>
                    <div class="flex justify-between w-2/3">
                        <input type="time" name="fromTime" id="fromTime"
                            class="w-2/5 p-1 pl-3 bg-gray-300 border-0 rounded-md" placeholder="Start">
                        <span>To</span>
                        <input type="time" name="tillTime" id="tillTime"
                            class="w-2/5 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                    </div>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="teachersPresent" class="align-top">Teachers Present</label>
                    <textarea name="teachersPresent" id="teachersPresent" cols="30" rows="3"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md"></textarea>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="startAge">Age Range</label>
                    <div class="flex justify-between w-2/3">
                        <input type="number" min="0" name="startAge" id="startAge"
                            class="w-1/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                        <span>To</span>
                        <input type="number" min="0" name="endAge" id="endAge"
                            class="w-1/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                    </div>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="assessedQuantity" class="flex-1">Number of children in assessment group</label>
                    <input type="number" name="assessedQuantity" id="assessedQuantity"
                        class="self-stretch w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="centreSettingQuantity" class="flex-1">Number of children in Centre / Setting</label>
                    <input type="number" name="centreSettingQuantity" id="centreSettingQuantity"
                        class="self-stretch w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md">
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="notes" class="align-top">Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="3"
                        class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md"></textarea>
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
