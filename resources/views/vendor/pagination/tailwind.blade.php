@if ($paginator->hasPages())
    <nav class="flex justify-center" role="navigation">
        {{-- Prev link --}}
        @if ($paginator->onFirstPage())
            <span class="transition-all px-4 py-2 bg-gray-300 text-gray-500 rounded-l-lg">{!! __('pagination.previous') !!}</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="transition-all px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-l-lg">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="transition-all px-4 py-2 bg-gray-300 text-gray-500">{{ $element }}</span>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="transition-all px-4 py-2 bg-blue-500 text-white ">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="transition-all px-4 py-2 bg-gray-200 text-gray-700 hover:bg-blue-600 hover:text-white">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="transition-all px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-r-lg">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="transition-all px-4 py-2 bg-gray-300 text-gray-500 rounded-r-lg">{!! __('pagination.next') !!}</span>
        @endif
    </nav>
@else
@endif

<div class="text-center mt-4">
    <p class="text-sm text-gray-700 leading-5">
        {!! __('Showing') !!}
        @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </p>
</div>
