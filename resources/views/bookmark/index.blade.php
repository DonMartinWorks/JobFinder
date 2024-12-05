<x-layouts.master>
    <x-slot name="title">
        {{ __('Bookmark Jobs') }}
    </x-slot>

    <h2 class="text-3xl text-center mb-4 font-bold border bg-white rounded-md border-gray-300 p-3">
        {{ __('Bookmark Jobs') }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
        @forelse ($bookmarks as $mark)
            <x-job-card :work="$mark" />
        @empty
            <p class="text-gray-500 text-center">
                {{ __('You have not bookmarked jobs!') }}
            </p>
        @endforelse
    </div>
</x-layouts.master>
