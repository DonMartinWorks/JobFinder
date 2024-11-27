@props([
    'id' => '',
    'label' => '',
    'required' => false,
])

<label @if ($required == true) title="{{ __('Required') }}" @endif
    class="md:block mb-2 transition-all text-gray-700 text-md focus:text-blue-500 focus:font-semibold hover:text-blue-500 flex items-center"
    for="{{ $id }}">{{ $label }}@if ($required == true)
        <span title="{{ __('Required') }}" class="text-red-600 sm:ml-1 md:ml-0">&#42;</span>
    @endif
</label>
