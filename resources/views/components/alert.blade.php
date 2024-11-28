@props([
    'type' => 'success',
    'message' => '',
    'timeout' => '5000',
])

@if (session()->has($type))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, {{ $timeout }})" x-show="show"
        :class="{
            'relative flex justify-between items-center p-4 mb-4 text-md font-medium text-white rounded-md border-2': true,
            'bg-sky-500 border-sky-600': '{{ $type }}' === 'info',
            'bg-teal-500 border-teal-600': '{{ $type }}' === 'success',
            'bg-rose-500 border-rose-600': '{{ $type }}' === 'error',
            'bg-yellow-500 border-yellow-600': '{{ $type }}' === 'warning'
        }"
    >
        <span>{{ $message }}</span>
        <button @click="show = false" class="text-white ml-4 hover:text-black transition-all">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
@endif

