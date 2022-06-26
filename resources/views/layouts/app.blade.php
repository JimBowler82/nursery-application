<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @stack('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div id="app" class="min-h-screen bg-white">

        <header class="w-full h-32" style="background: linear-gradient(180deg,#296036 75%,#9dbe42 75%);">
            <div class="flex items-center justify-between h-full px-20">

                <a href="{{ route('home') }}" class="flex">
                    <div id="logo" class="self-center w-20 h-20 p-3 bg-white rounded-full shadow-xl">
                        {{-- <img src="" alt="" class="w-20 h-20"> --}}
                    </div>

                    <h1 class="self-center ml-8 text-2xl text-white">{{ $pageTitle ?? 'Nursery App' }}</h1>
                </a>

                <div id="nav" class="flex w-1/2">
                    {{ $nav ?? '' }}
                </div>

            </div>
        </header>

        <!-- Page Content -->
        <main class="w-full px-20">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
