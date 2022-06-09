@props([
    'data'
])

<div class="p-4 mb-6 mr-10 w-80 shadow-userCard">
    <h3 class="w-full text-2xl font-bold">{{ $data->name }}</h3>
    <a href="{{ route('centres.edit', ['centre' => $data->id]) }}"
       class="mt-6 flex items-center justify-center w-full text-lg text-white transition-colors duration-200 bg-lightGreen hover:bg-darkGreen py-3 mb-3">
        View
    </a>
</div>
