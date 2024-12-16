<x-layouts.master>
    <x-slot name="title">
        {{ __('All Jobs') }}
    </x-slot>

    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <x-search />
    </div>

    <x-title title="{{ __('All Jobs') }}" />

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
