@props(['work'])

<div class="rounded-lg shadow-md bg-white p-4">
    <div class="flex items-center space-between gap-4">
        @if ($work->company_logo)
            <img src="{{ $work->company_logo }}" alt="{{ $work->title }}" class="w-14 rounded-full" />
        @endif

        <div>
            <h2 class="text-xl font-semibold">
                {{ $work->title }}
            </h2>

            <x-partials.job-type :work="$work->job_type" />
        </div>
    </div>

    <p class="text-gray-600 text-md text-center mt-2 px-1">
        {{ Str::limit($work->description, 100) }}
    </p>

    <ul class="my-4 bg-gray-100 p-4 rounded">
        <li class="mb-2 flow-root">
            <strong class="float-start">{{ __('Salary') }}&#58;</strong>&nbsp;&#x24;{{ number_format($work->salary) }}

            <div class="float-end">
                @if ($work->remote)
                    <span class=" bg-cyan-500 border-2 border-cyan-600 text-gray-50 rounded-md px-2 py-1 ml-2"
                        title="{{ __('Remote') }}">
                        <i class="fa-solid fa-globe mr-2"></i><span
                            class="text-gray-50 font-semibold">{{ __('Remote') }}</span>
                    </span>
                @else
                    <span class="text-md bg-rose-500 border-2 border-rose-600 text-white rounded-md px-2 py-1 ml-2"
                        title="{{ __('On-site') }}">
                        <i class="fa-solid fa-building mr-2"></i><span
                            class="text-white font-semibold">{{ __('On-site') }}</span>
                    </span>
                @endif
            </div>
        </li>

        <li class="mb-2">
            <strong>{{ __('Location') }}&#58;</strong>&nbsp;{{ $work->city }}&#44;&nbsp;<span
                class="text-gray-500 font-medium underline underline-offset-2">
                {{ $work->state }}
            </span>
        </li>

        @if ($work->tags)
            <li class="mb-2">
                <strong>{{ __('Tags') }}&#58;</strong>&nbsp;{{ ucwords(str_replace(',', ', ', $work->tags)) }}
            </li>
        @endif
    </ul>

    <a href="{{ route('jobs.show', $work->slug) }}"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200 transition-all">
        {{ __('Details') }}
    </a>
</div>
