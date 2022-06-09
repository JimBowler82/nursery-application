<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
        class="flex items-center px-8 py-2 text-black transition-colors duration-200 bg-white hover:bg-lightGreen">
        Log Out
    </a>

</form>
