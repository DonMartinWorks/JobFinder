@props(['text' => __('Save')])

<div class="lg:mx-1">
    <button type="submit"
        class="w-full bg-green-500 hover:bg-green-600 transition-all text-white px-4 py-2 my-3 rounded-md focus:outline-none">
        {{ $text }}
    </button>
</div>
