<div class="p-4 w-80 shadow-userCard">
    <h3 class="w-full text-2xl font-bold">Nursery Name</h3>
    <p class="mb-6 text-lg">8/30 questions completed</p>
    <a href="#"
        class="flex items-center justify-center w-full py-3 mb-3 text-lg text-white transition-colors duration-200 bg-lightGreen hover:bg-darkGreen">
        Continue Assessment
    </a>
    <form action="" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="w-full py-3 text-lg transition-colors duration-200 border border-gray-200 hover:bg-red-500">Delete</button>
    </form>
</div>
