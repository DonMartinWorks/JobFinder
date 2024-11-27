@props([
    'url' => url('/'),
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'hoverClass' => 'hover:bg-yellow-600 hover:text-white',
    'textClass' => 'text-black',
    'rounded' => 'rounded',
    'block' => false,
])

<a href="{{ $url }}"
    class="{{ $bgClass }} {{ $hoverClass }} {{ $textClass }} px-4 py-2 {{ $rounded }} transition-all duration-300 {{ $block ? 'block' : '' }}">
    @if ($icon)
        <i class="fa-regular fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
