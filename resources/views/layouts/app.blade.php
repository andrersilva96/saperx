<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body x-data>
    <header>
        @include('layouts.partials.navbar')
    </header>

    <!-- Page Content -->
    <main class="container py-3">
        @hasSection('content')
            <!-- Blade -->
            @yield('content')
        @else
            <!-- Livewire -->
            {{ $slot }}
        @endif
    </main>

    @routes

    @livewireScripts

    @stack('scripts')
</body>

</html>
