@props(['assessment', 'user'])

<div class="p-4 w-80 shadow-userCard">
    <h3 class="w-full text-2xl font-bold">{{ $assessment->centreSetting->name ?? 'No Name Set' }}</h3>
    <p class="text-lg">{{ $assessment->totalNumberOfQuestionsAnswered }} / {{ $assessment->totalNumberOfQuestions }} questions completed</p>

    @if (isset($user))
        <p class="text-lg">User: {{ $user->name ?? '' }}</p>
    @endif

    @if (!$assessment->completed)
        <a href="{{ route('assessments.edit', ['assessment' => $assessment->id]) }}"
            class="flex items-center justify-center w-full py-3 mb-3 mt-6 text-lg text-white transition-colors duration-200 bg-lightGreen hover:bg-darkGreen">
            Resume
        </a>
    @else
        <a href="{{ route('assessments.edit', ['assessment' => $assessment->id]) }}"
            class="flex items-center justify-center w-full py-3 mb-3 mt-6 text-lg text-white transition-colors duration-200 bg-lightGreen hover:bg-darkGreen">
            Edit
        </a>
    @endif

    <form action="{{ route('assessments.destroy', ['assessment' => $assessment->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"
            class="w-full py-3 text-lg transition-colors duration-200 border border-gray-200 hover:bg-red-500">Delete</button>
    </form>
</div>
