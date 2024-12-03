@props(['messages'])

@if ($messages)
    <div class="lg:m-1 md:mt-1 mt-2">
        <ul
            {{ $attributes->merge(['class' => 'text-gray-50 bg-rose-600 shadow-md rounded-md text-sm p-2 font-bold block w-full max-w-full text-center']) }}>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
