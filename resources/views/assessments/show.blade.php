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

    <div class="flex items-stretch w-full mt-12">

        <div class="w-full formContainer">
            <x-auth-session-status class="mb-2 ml-16" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h2 class="ml-16 mt-4 text-2xl font-bold">Assessment Number: {{$assessment->uuid}}</h2>

            <article class="flex-col w-2/5 mx-auto mt-20">

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" value="{{ $assessment->completed == 1 ? 'Completed' : 'In Progress' }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="date">Assessment Date</label>
                    <input type="date" name="date" id="date" value="{{ $assessment->date }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="qAnswered">Questions Answered</label>
                    <input type="text" name="qAnswered" id="qAnswered" value="{{ $assessment->totalNumberOfQuestionsAnswered }} / {{ $assessment->totalNumberOfQuestions }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="date">Assessment Date</label>
                    <input type="date" name="date" id="date" value="{{ $assessment->date }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="time">Time of Assessment</label>
                    <input type="time" name="time" id="time" value="{{ $assessment->from_time }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>

                <div class="flex items-center justify-between w-full py-2 form-group">
                    <label for="score">Assessment Score</label>
                    <input type="text" name="score" id="score" value="{{ $assessment->score ?? '0%' }}"
                           class="w-2/3 p-1 pl-3 bg-gray-300 border-0 rounded-md" readonly>
                </div>


                <div class="flex justify-end w-full pt-2 mt-2">
                    <div class="w-2/3 flex justify-between">
                        <form action="{{ route('assessments.destroy', ['assessment' => $assessment->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="px-8 py-3 mr-4 transition-colors duration-200 bg-gray-200 hover:bg-red-500">Delete</button>
                        </form>

                        <a  href="{{route('assessments.edit', ['assessment' => $assessment->id])}}"
                            class=" px-10 py-3 text-white transition-colors duration-200 bg-darkGreen hover:bg-lightGreen hover:text-darkGreen">
                            {{ $assessment->completed ? 'Edit' : 'Resume'  }}
                        </a>
                    </div>

                </div>
            </article>
        </div>
    </div>
</x-app-layout>
