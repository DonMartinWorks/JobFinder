<form method="POST" action="{{ route('profile.avatar.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mt-2 flex justify-center">
        <img src="{{ $user->avatar ? $user->avatar : asset('imgs/avatar.svg') }}" alt="{{ $user->name }}"
            class="w-32 h-32-object-cover rounded-full">
    </div>

    <x-inputs.file id="avatar" name="avatar" label="{{ __('Update Avatar') }}" />
    <input type="hidden" name="old_avatar" value="{{ @$user->avatar }}">

    <x-submit-button text="{{ __('Update Avatar') }}" />
</form>
