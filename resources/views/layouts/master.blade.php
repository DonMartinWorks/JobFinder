<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} &mdash; {{ config('app.name', 'Laravel') }}</title>

    <script src="https://kit.fontawesome.com/57dd9a61ba.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/styles.css')
</head>

<body class="bg-gray-100">
    @include('layouts.sections.header')

    @if (request()->is('/'))
        <x-hero />

        <x-top-banner />
    @endif

    <main class="container mx-auto p-4">
        @include('components.toast')

        {{ $slot }}
    </main>


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('layouts.sections.alert-delete-item')
</body>

</html>
