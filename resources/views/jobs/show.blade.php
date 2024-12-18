<x-layouts.master>
    <x-slot name="title">
        {{ __('Show Job') }}&#58;&nbsp;{{ $work->title }}
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Job Details Column -->
        <section class="md:col-span-3">
            <div class="rounded-lg shadow-md bg-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-blue-700" href="{{ route('jobs.index') }}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        {{ __('Back To Listings') }}
                    </a>

                    <div class="flex space-x-3 ml-4">
                        <x-partials.edit-delete-button :work="$work" />
                    </div>

                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold">
                        {{ $work->title }}
                    </h2>

                    <p class="text-gray-700 text-lg mt-2">
                        {{ $work->description }}
                    </p>

                    <ul class="my-4 bg-gray-100 p-4">
                        <li class="flex items-center mb-2">
                            <strong class="mr-2">{{ __('Job Type') }}&#58;</strong>
                            <x-partials.job-type :work="$work->job_type" />
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Remote') }}&#58;</strong>&nbsp;{{ $work->remote ? __('Yes') : __('No') }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Salary') }}&#58;</strong>&nbsp;&#x24;{{ number_format($work->salary) }}
                        </li>
                        <li class="mb-2">
                            <strong>{{ __('Site Location') }}&#58;</strong>&nbsp;{{ $work->city }}&#44;&nbsp;{{ $work->state }}
                        </li>
                        @if ($work->tags)
                            <li class="mb-2">
                                <strong>{{ __('Tags') }}&#58;</strong>&nbsp;{{ ucwords(str_replace(',', ', ', $work->tags)) }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            @if ($work->map_link)
                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                    <iframe class="rounded-lg" src="{{ $work->map_link }}" width="1075" height="500"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            @endif

            <div class="container mx-auto p-4">
                @if ($work->requirements || $work->benefits)
                    <h2 class="text-xl font-semibold mb-4">{{ __('Job Details') }}</h2>
                    <div class="rounded-lg shadow-md bg-white p-4">
                        <h3 class="text-lg font-semibold mb-2 text-blue-500">
                            {{ __('Job Requirements') }}
                        </h3>
                        <p>
                            {{ $work->requirements }}
                        </p>
                        <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                            {{ __('Benefits') }}
                        </h3>
                        <p>
                            {{ $work->benefits }}
                        </p>
                    </div>
                @endif

                @auth
                    <p class="my-5">
                        {{ __('Put Job Application as the subject of your email and attach your resume.') }}
                    </p>

                    <x-modal-applicant-job :work="$work" />
                @else
                    <div class="m-3 mt-4">
                        <p class="bg-stone-200 text-stone-700 text-lg font-bold w-full py-4 px-4 rounded-sm text-center">
                            <i class="fas fa-info-circle mr-1"></i>{{ __('You must be logged in to apply for this job') }}
                        </p>
                    </div>
                @endauth

            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white rounded-lg shadow-md p-3">
            <h3 class="text-2xl text-center mb-4 underline-offset-2 underline font-bold">
                {{ __('Company Info') }}
            </h3>

            @if ($work->company_logo)
                <x-partials.image src="{{ $work->company_logo }}" name="{{ $work->company_name }}" />
            @endif

            <h4 class="text-lg font-bold">{{ $work->company_name }}</h4>

            @if ($work->company_logo)
                <p class="text-gray-700 text-lg my-3">
                    {{ $work->company_description }}
                </p>
            @endif

            @if ($work->company_website)
                <a href="{{ $work->company_website }}" target="_blank"
                    class="text-blue-500">{{ __('Visit Website') }}</a>
            @endif

            @guest
                <p class="mt-10 bg-gray-200 text-gray-700 font-bold w-full py-2 px-4 rounded-full text-center">
                    <i class="fas fa-info-circle mr-1"></i>{{ __('You must be logged in to bookmark this job') }}
                </p>
            @endguest

            @auth
                <form
                    action="{{ auth()->user()->bookmarkedJobs()->where('work_id', $work->id)->exists()? route('job.bookmark.destroy', $work->id): route('job.bookmark.store', $work->id) }}"
                    method="POST" class="mt-10">
                    @csrf
                    @if (auth()->user()->bookmarkedJobs()->where('work_id', $work->id)->exists())
                        @method('DELETE')
                        <button
                            class="transition-all bg-rose-500 hover:bg-rose-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-eraser mr-3"></i>{{ __('Delete Bookmark') }}
                        </button>
                    @else
                        <button
                            class="transition-all bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-bookmark mr-3"></i>{{ __('Bookmark Listing') }}
                        </button>
                    @endif

                </form>
            @endauth
        </aside>
    </div>
</x-layouts.master>
