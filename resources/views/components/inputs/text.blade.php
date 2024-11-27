@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'min' => null,
    'max' => null,
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        <x-inputs.label id="{{ $id }}" label="{{ $label }}" required="{{ $required ? 1 : 0 }}" />
    @endif

    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
        @if (!is_null($min)) min="{{ $min }}" @endif
        @if (!is_null($max)) max="{{ $max }}" @endif
        @if ($required == true) required @endif
        class="w-full transition-all p-2 border focus:border-blue-500 rounded focus:outline-none @error($name) border-rose-600 focus:border-rose-600 bg-rose-50 @enderror"
        value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" />

    <x-inputs.error name="{{ $name }}" />
</div>
