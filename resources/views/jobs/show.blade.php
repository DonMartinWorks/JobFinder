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
                        <a href="{{ route('jobs.edit', $work->slug) }}"
                            class="transition-all px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                            {{ __('Edit') }}
                        </a>

                        <!-- Delete Form -->
                        <form id="delete-form-{{ $work->id }}" action="{{ route('jobs.destroy', $work->id) }}"
                            method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="delete-item transition-all px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                                {{ __('Delete') }}
                            </button>
                        </form>
                        <!-- End Delete Form -->
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
                        <li class="mb-2">
                            <strong>{{ __('Job Type') }}&#58;</strong>&nbsp;{{ $work->job_type }}
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

                <p class="my-5">
                    {{ __('Put "Job Application" as the subject of your email and attach your resume.') }}
                </p>
                <a href="mailto:{{ $work->contact_email }}"
                    class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                    {{ __('Apply Now') }}
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <div id="map"></div>
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

            <a href=""
                class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center"><i
                    class="fas fa-bookmark mr-3"></i>&nbsp;{{ __('Bookmark Listing') }}</a>
        </aside>
    </div>
</x-layouts.master>
