@props(['user'])

<div class="h-32 p-3 mr-4 w-80 shadow-userCard">
    <h3 class="flex items-center w-full text-2xl h-1/2">{{ ucwords($user->name) }}</h3>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
        class="flex items-center justify-center w-full text-lg text-white transition-colors duration-200 bg-lightGreen h-1/2 hover:bg-darkGreen">
        View User
    </a>
</div>
