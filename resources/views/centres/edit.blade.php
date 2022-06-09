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
        <h1 class="text-3xl">Edit {{ ucwords($centre->type)  }}</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form action="{{ route('centres.update', ['centre' => $centre->id]) }}" method="POST" class="flex flex-col mt-10">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="flex items-center w-full mt-4">
                <label for="name" class="w-1/4">Name</label>
                <input type="text" id="name" class="w-3/4 bg-gray-200 border-none " name="name"
                       value="{{ $centre->name }}" placeholder="Enter Name of Setting / Centre" required autofocus>
            </div>

            <!-- Setting / Centre type -->
            <div class="flex items-center w-full mt-4">
                <label for="type" class="w-1/4">Type <small>(Setting or Centre)</small></label>
                <select name="type" id="type" class="w-3/4 bg-gray-200 border-none " required>
                    <option value="centre" {{ $centre->type === 'centre' ? 'selected' : '' }}>Centre</option>
                    <option value="setting" {{ $centre->type === 'setting' ? 'selected' : '' }}>Setting</option>
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
                    class="w-3/4 bg-gray-200 border-none ">{{ $centre->description }}</textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end w-full mt-8">
                <button type="button" id="delete-btn"
                        class="px-8 py-3 mr-4 transition-colors duration-200 bg-gray-200 hover:bg-red-500">Delete</button>
                <button type="submit"
                        class="px-12 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">Save</button>
            </div>
        </form>

        <form action="{{ route('centres.destroy', ['centre' => $centre->id]) }}" method="POST" id="delete-form">
            @csrf
            @method('DELETE')
            <input type="hidden" value="">
        </form>

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

    </div>


</x-app-layout>
