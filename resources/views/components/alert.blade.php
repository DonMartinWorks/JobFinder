@props([
    'type' => 'success',
    'message' => '',
    'timeout' => '5000',
])

@if (session()->has($type))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, {{ $timeout }})" x-show="show"
        class="relative flex justify-between items-center p-4 mb-4 text-sm text-white rounded-md
        {{ $type == 'success' ? 'bg-teal-500 border-2 border-teal-600' : 'bg-rose-500 border-2 border-rose-600' }}
        {{ $type == 'error' ? 'bg-rose-500 border-2 border-rose-600' : '' }}
        {{ $type == 'warning' ? 'bg-yellow-500 border-2 border-yellow-600' : '' }}">
        <span>{{ $message }}</span>
        <button @click="show = false" class="text-white ml-4 hover:text-black transition-all">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
@endif
