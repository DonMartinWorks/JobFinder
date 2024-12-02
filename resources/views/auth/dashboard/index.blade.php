<x-layouts.master>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <span class="text-purple-600 font-extrabold">
        {{ $user->name }}
    </span>
</x-layouts.master>
