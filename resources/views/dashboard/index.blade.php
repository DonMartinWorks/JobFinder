<x-layouts.master>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <section class="flex flex-col md:flex-row gap-4">
        <!-- PROFILE INFO FORM -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">{{ __('Profile Information') }}</h3>

            @include('forms.profile')
        </div>

        <!-- JOB LISTINGS -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">{{ __('My Jobs Listings') }}</h3>

            @forelse ($works as $work)
            <div
            class="flex justify-between items-center border-b-2 transition-all hover:bg-gray-100 border-gray-200 p-2">
            <div>
                <a href="{{ route('jobs.show', $work->slug) }}"
                    class="transition-all text-xl font-semibold hover:text-blue-600">{{ $work->title }}</a>
                    <x-partials.job-type :work="$work->job_type" />
                    </div>

                    <div class="flex space-x-3 ml-4">
                        <x-partials.edit-delete-button :work="$work" :dashboard="true" />
                    </div>
                </div>
                @empty
                <p class="text-xl text-center text-gray-500 font-semibold">{{ __('You have not job listing') }}</p>
                @endforelse
            </div>
        </section>

        <x-bottom-banner />
</x-layouts.master>
