<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Name -->
    <x-inputs.text id="name" name="name" label="{{ __('Name') }}" placeholder="{{ __('Matt Damon') }}"
        value="{{ $user->name }}" :required="true" />

    <!-- Email -->
    <x-inputs.text id="email" name="email" label="{{ __('Email') }}" placeholder="{{ __('matt@damon.com') }}"
        value="{{ $user->email }}" :required="true" />

    <x-submit-button text="{{ __('Update') . ' ' . $user->name }}" />
</form>
