<x-layouts.master>
    <x-slot name="title">
        {{ __('Register') }}
    </x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
            <h2 class="text-4xl text-center font-bold mb-4">
                {{ __('Register') }}
            </h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <x-inputs.text id="name" name="name" label="{{ __('Name') }}"
                    placeholder="{{ __('Matt Damon') }}" :required="true" />

                <!-- Email Address -->
                <x-inputs.text id="email" name="email" type="email" label="{{ __('Email') }}"
                    placeholder="{{ __('matt@damon.com') }}" :required="true" />

                <!-- Password -->
                <x-inputs.text id="password" name="password" type="password" label="{{ __('Password') }}"
                    :required="true" />

                <!-- Confirm Password -->
                <x-inputs.text id="password_confirmation" name="password_confirmation" type="password"
                    label="{{ __('Confirm Password') }}" :required="true" />

                <div class="mt-6">
                    <x-button-auth button="{{ __('Register') }}" />
                </div>
            </form>
        </div>
    </main>
</x-layouts.master>
