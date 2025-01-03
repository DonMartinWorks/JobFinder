<x-layouts.master>
    <x-slot name="title">
        {{ __('Welcome to') }}&nbsp;{{ config('app.name', 'Laravel') }}
    </x-slot>

    <x-title title="{{ __('Welcome to') }} {{ config('app.name', 'Laravel') }}" />

    <x-bottom-banner />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6 p-1 lg:p-3 sm:p-0">
        @forelse ($works as $work)
            <x-job-card :work="$work" />
        @empty
            <p>{{ __('No jobs avariable!') }}</p>
        @endforelse
    </div>

    <div class="mb-3">
        <a href="{{ route('jobs.index') }}"
            class="block text-xl text-center hover:text-yellow-400 hover:underline hover:underline-offset-2 transition-all">
            <i class="fa-solid fa-arrow-rotate-right mr-3"></i>{{ __('Show all jobs') }}
        </a>
    </div>

</x-layouts.master>
