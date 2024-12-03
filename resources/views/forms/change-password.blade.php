<form method="POST" action="{{ route('profile.password.update') }}">
    @csrf
    @method('PUT')
    <!-- Current Password -->
    <x-inputs.text id="current_password" name="current_password" type="password" label="{{ __('Current Password') }}"
        :required="true" />
    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

    <!-- New Password -->
    <x-inputs.text id="password" name="password" type="password" label="{{ __('New Password') }}" :required="true" />
    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

    <!-- New Password -->
    <x-inputs.text id="password_confirmation" name="password_confirmation" type="password"
        label="{{ __('Confirm Password') }}" :required="true" />
    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />


    <x-submit-button text="{{ __('Update Password') }}" />
</form>
