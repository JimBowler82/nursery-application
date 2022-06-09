<div class="p-4 mt-10 mr-10 w-80 shadow-userCard">
    <h3 class="w-full text-2xl font-bold">Nursery Name</h3>
    <p class="mb-6 text-lg">8/30 questions completed</p>
    <a href="#"
       class="flex items-center justify-center w-full text-lg text-white transition-colors duration-200 bg-lightGreen hover:bg-darkGreen py-3 mb-3">
        Continue Assessment
    </a>
    <form action="" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full text-lg border border-gray-200 py-3 hover:bg-red-500 transition-colors duration-200">Delete</button>
    </form>
</div>
