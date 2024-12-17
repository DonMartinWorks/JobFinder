<x-layouts.master>
    <x-slot name="title">
        {{ __('All Jobs') }}
    </x-slot>

    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <x-search />
    </div>

    {{-- Back Button --}}
    @if (request()->has('keywords') || request()->has('location'))
        <a href="{{ route('jobs.index') }}"
            class="bg-gray-700 hover:bg-purple-700 text-white px-4 py-2 rounded mb-4 inline-block transition-all">
            <i class="fa-solid fa-left-long mr-3"></i>{{ __('Back') }}
        </a>
    @endif

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
