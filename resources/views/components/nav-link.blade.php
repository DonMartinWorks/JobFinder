<!-- Authentication Component -->
@props([
    'url' => url('/'),
    'active' => false,
    'icon' => null,
    'mobile' => null,
    'textColor' => 'text-gray-50',
])

@if ($mobile)
    @if ($url == route('logout'))
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div>
                <button type="submit"
                    class="block transition-all p-4 my-8 bg-rose-700 rounded-lg {{ $textColor }} {{ $active ? 'text-white bg-blue-700 rounded-md font-semibold' : '' }}">
                    {{ $slot }}
                    @if ($icon)
                        <i class="{{ $icon }} ml-1"></i>
                    @endif
                </button>
            </div>
        </form>
    @else
        <a href="{{ $url }}"
            class="block transition-all px-4 py-2 {{ $textColor }} hover:bg-blue-700 {{ $active ? 'text-white bg-blue-700 rounded-md font-semibold' : '' }}">
            @if ($icon)
                <i class="{{ $icon }} mr-1"></i>
            @endif
            {{ $slot }}
        </a>
    @endif
@else
    @if ($url == route('logout'))
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                class="{{ $textColor }} w-full hover:text-yellow-500 transition-all hover:underline underline-offset-4 py-2 {{ $active ? 'text-yellow-500 font-semibold underline underline-offset-4' : '' }}">
                {{ $slot }}
                @if ($icon)
                    <i class="{{ $icon }} ml-1"></i>
                @endif
            </button>
        </form>
    @else
        <a href="{{ $url }}"
            class="{{ $textColor }} hover:text-yellow-500 transition-all hover:underline underline-offset-4 py-2 {{ $active ? 'text-yellow-500 font-semibold underline underline-offset-4' : '' }}">
            @if ($icon)
                <i class="{{ $icon }} mr-1"></i>
            @endif
            {{ $slot }}
        </a>
    @endif
@endif
