@props([
    'heading' => __('Looking to hire?'),
    'subheading' => __('Post your job listing now and find the perfect candidate.'),
])

<section class="container mx-auto my-6">
    <div class="bg-blue-800 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-2xl font-semibold">
                {{ $heading }}
            </h2>

            <p class="text-gray-200 text-md mt-2">
                {{ $subheading }}
            </p>
        </div>

        @auth
            <x-button-link url="{{ route('jobs.create') }}" icon="edit">
                {{ __('Create Job') }}
            </x-button-link>
        @endauth
    </div>
</section>
