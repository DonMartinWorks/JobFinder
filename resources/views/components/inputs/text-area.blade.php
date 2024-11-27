@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'value' => '',
    'placeholder' => '',
    'cols' => '30',
    'rows' => '7',
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        @if ($label)
            <x-inputs.label id="{{ $id }}" label="{{ $label }}" required="{{ $required ? 1 : 0 }}" />
        @endif
    @endif

    <textarea id="{{ $id }}" name="{{ $name }}" cols="{{ $cols }}" rows="{{ $rows }}"
        @if ($required == true) required @endif
        class="w-full transition-all p-2 border focus:border-blue-500 rounded focus:outline-none @error($name) border-rose-600 focus:border-rose-600 bg-rose-50 @enderror"
        placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>

    <x-inputs.error name="{{ $name }}" />
</div>
