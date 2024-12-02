@props([
    'work' => '',
    'dashboard' => false,
])

@can('update', $work)
    <a href="{{ route('jobs.edit', $work->slug) }}" title="{{ __('Edit') }}"
        class="transition-all px-4 py-2 bg-gray-400 hover:bg-yellow-400 hover:text-black text-white rounded">
        <i class="fa-solid fa-pencil"></i>
    </a>
@endcan

<!-- Delete Form -->
@can('delete', $work)
    <form id="delete-form-{{ $work->id }}"
        action="{{ route('jobs.destroy', $work->id) }}?from={{ $dashboard ? route('dashboard') : route('jobs.index') }}"
        method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" title="{{ __('Delete') }}"
            class="delete-item transition-all px-4 py-2 bg-gray-400 hover:bg-red-600 text-white rounded">
            <i class="fa-solid fa-trash-can"></i>
        </button>
    </form>
@endcan

<!-- End Delete Form -->
