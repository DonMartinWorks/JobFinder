@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'value' => '',
    'options' => [],
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        @if ($label)
            <x-inputs.label id="{{ $id }}" label="{{ $label }}" required="{{ $required ? 1 : 0 }}" />
        @endif
    @endif

    <select id="{{ $id }}" name="{{ $name }}" @if ($required == true) required @endif
        class="w-full transition-all p-2 border focus:border-blue-500 rounded focus:outline-none @error($name) border-rose-600 focus:border-rose-600 bg-rose-50 @enderror">
        <option value="" selected disabled class="bg-orange-600 text-white">{{ __('Select') }}</option>
        @foreach ($options as $optValue => $optLabel)
            <option {{ old($name, $value) == $optValue ? 'selected' : '' }} value="{{ $optValue }}">
                {{ $optLabel }}
            </option>
        @endforeach
    </select>

    <x-inputs.error name="{{ $name }}" />
</div>
