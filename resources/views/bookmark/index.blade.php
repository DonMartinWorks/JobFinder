<x-layouts.master>
    <x-slot name="title">
        {{ __('Bookmark Jobs') }}
    </x-slot>

    <x-title title="{{ __('Bookmark Jobs') }}" />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
        @forelse ($bookmarks as $mark)
            <x-job-card :work="$mark" />
        @empty
            <div class="col-span-1 md:col-span-3 flex justify-center items-center">
                <p class="text-blue-500 font-bold text-md text-center">
                    {{ __('You have not bookmarked jobs!') }}
                </p>
            </div>
        @endforelse
    </div>
</x-layouts.master>
