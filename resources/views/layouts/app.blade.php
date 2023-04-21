<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Impresariaat') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 grid grid-cols-4 sm:grid-cols-10 md:grid-cols-12 xl:grid-cols-6">

    <x-nav.dashboard class="col-span-1"/>

    <div class="col-span-3 sm:col-span-9 md:col-span-11 xl:col-span-5">
        <div class="xl:p-12 py-12 px-4 md:px-6">
            <div class="space-y-6">
                @isset($title)
                    <h1 class="font-semibold lg:text-4xl text-2xl">{{ $title }}</h1>
                @endisset
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
