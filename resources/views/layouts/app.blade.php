<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'La Belle') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-black text-dark">

    @include('layouts.navigation')

    @isset($header) 
        <header class="bg-white border-bottom border-warning py-3">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="container">
        {{ $slot }}
    </main>
    @stack('scripts')
</body>
</html>
