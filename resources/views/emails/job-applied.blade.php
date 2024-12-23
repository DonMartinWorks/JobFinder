<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('New Job Application') }} &mdash; {{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/styles.css')
</head>

<body class="max-w-2xl px-6 py-8 mx-auto bg-white">
    <header>
        <a href="#">
            <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/full-logo.svg" alt="">
        </a>
    </header>

    <main class="mt-8">
        <h2 class="text-gray-700">Hi Olivia,</h2>

        <p class="mt-2 leading-loose text-gray-600 mb-4">
            {{ __('There has been a new job application to') }}&nbsp;<span
                class="font-semibold ">{{ config('app.name', 'Laravel') }}</span>.
        </p>

        <a href="{{ route('login') }}"
            class="px-6 py-2 mt-4 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            {{ 'Login to access the application' }}
        </a>

        <p class="mt-8 text-gray-600">
            {{ __('Thanks') }}&nbsp;<br>
            {{ config('app.name', 'Laravel') }}
        </p>
    </main>
</body>

</html>
