<x-layouts.master>
    <x-slot name="title">
        {{ __('All Jobs') }}
    </x-slot>

    <h2 class="text-2xl">
        {{ __('All Jobs') }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6 p-1 lg:p-3 sm:p-0">
        @forelse ($works as $work)
            <x-job-card :work="$work" />
        @empty
            <p>{{ __('No jobs avariable!') }}</p>
        @endforelse
    </div>

    <div class="m-3">
        {{ $works->links() }}
    </div>
</x-layouts.master>
