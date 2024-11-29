@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'checked' => false,
    'class' => 'block mt-4',
    'class2' => 'inline-flex items-center',
    'class3' => 'rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-600',
    'class4' => 'ms-2 text-sm text-gray-600',
    'value' => 1,
])

<input type="hidden" name="{{ $name }}" value="0">

<div class="{{ $class }}">
    <label for="{{ $id }}" class="{{ $class2 }}">
        <input id="{{ $id }}" type="checkbox" class="{{ $class3 }}" name="{{ $name }}"
            @if ($checked) checked @endif value="{{ $value }}">
        @if ($label)
            <span class="{{ $class4 }}">{{ $label }}</span>
        @endif
    </label>

    <x-inputs.error name="{{ $name }}" />
</div>
