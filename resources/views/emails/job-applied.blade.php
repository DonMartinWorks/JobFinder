<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('New Job Application') }} &mdash; {{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-2xl px-6 py-8 mx-auto bg-white">
    <main class="mt-8">
        <h2 class="text-gray-700 text-xl font-bold">
            {{ __('New Applicant') }}&#58;&nbsp;{{ $applicant->full_name }}
        </h2>

        <p class="mt-2 leading-loose text-gray-600 mb-4">
            {{ __('There has been a new job application to') }}&nbsp;<span
                class="font-semibold ">{{ config('app.name', 'Laravel') }}</span>.
        </p>

        <p class="mt-2 leading-loose text-gray-600 mb-4">
            {{ __('Job Title') }}&#58;&nbsp;<strong class="font-semibold ">
                {{ $work->title }}
            </strong>&#46;
        </p>

        <p class="my-2 uppercase underline underline-offset-2 text-black font-normal">
            {{ __('Application Details') }}
        </p>

        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt dt class="text-sm/6 font-medium text-gray-900">{{ __('Full Name') }}</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $applicant->full_name }}
            </dd>
        </div>

        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Phone') }}</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $applicant->contact_phone }}
            </dd>
        </div>

        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Email') }}</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $applicant->contact_email }}
            </dd>
        </div>

        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Message') }}</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $applicant->message }}
            </dd>
        </div>

        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm/6 font-medium text-gray-900">{{ __('Location') }}</dt>
            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $applicant->location }}
            </dd>
        </div>

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
