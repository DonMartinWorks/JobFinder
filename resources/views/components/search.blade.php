<form method="GET" action="{{ route('jobs.search') }}" class="block mx-5 space-y-2 md:mx-auto md:space-x-2">
    @csrf
    <input type="text" name="keywords" placeholder="{{ __('Keywords') }}"
        class="w-full md:w-72 px-4 py-3 focus:outline-none" />

    <input type="text" name="location" placeholder="{{ __('Location') }}"
        class="w-full md:w-72 px-4 py-3 focus:outline-none" />

    <button
        class="w-full md:w-auto bg-blue-700 hover:bg-blue-600 hover:rounded-md transition-all text-white px-4 py-3 focus:outline-none">
        <i class="fa fa-search mr-1"></i> {{ __('Search') }}
    </button>
</form>
