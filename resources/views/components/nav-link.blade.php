@props([
    'url' => url('/'),
    'active' => false,
    'icon' => null,
    'mobile' => null,
    'textColor' => 'text-gray-50',
])

@if ($mobile)
    <a href="{{ $url }}"
        class="block transition-all px-4 py-2 {{$textColor}}  hover:bg-blue-700 {{ $active ? 'text-white bg-blue-700 rounded-md font-semibold' : '' }}">
        @if ($icon)
            <i class="fa fa-{{ $icon }} mr-1"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <a href="{{ $url }}"
        class="{{$textColor}} hover:text-yellow-500 transition-all hover:underline underline-offset-4 py-2 {{ $active ? 'text-yellow-500 font-semibold underline underline-offset-4' : '' }}">
        @if ($icon)
            <i class="fa-regular fa-{{ $icon }} mr-1"></i>
        @endif
        {{ $slot }}
    </a>
@endif
