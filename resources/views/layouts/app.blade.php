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
<div class="min-h-screen bg-gray-100 grid grid-cols-6">
    <sidebar class="bg-primary/25 col-span-1 p-8 space-y-4 text-2xl">
        <h2 class="text-4xl font-semibold">
            {{ __('Dashboard') }}
        </h2>
        <x-nav.dashboard/>
    </sidebar>

    <div class="col-span-5">
        <div class="p-12">
            <div class="space-y-6 max-w-7xl">
                @isset($title)
                    <h1 class="font-semibold text-4xl">{{ $title }}</h1>
                @endisset
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
