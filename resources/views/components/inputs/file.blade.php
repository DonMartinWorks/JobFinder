@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        @if ($label)
            <x-inputs.label id="{{ $id }}" label="{{ $label }}" required="{{ $required ? 1 : 0 }}" />
        @endif
    @endif

    <input type="file" id="{{ $id }}" name="{{ $name }}"
        @if ($required == true) required @endif
        class="w-full px-4 py-2 border rounded focus:outline-none @error($name) border-rose-600 focus:border-rose-600 bg-rose-50 @enderror" />

    <x-inputs.error name="{{ $name }}" />
</div>
