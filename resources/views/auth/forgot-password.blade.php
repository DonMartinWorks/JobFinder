<x-layouts.master>
    <x-slot name="title">
        {{ __('Forgot your password?') }}
    </x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
            <h2 class="text-4xl text-center font-bold m-4">
                {{ __('Forgot your password?') }}
            </h2>

            <h2 class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <x-inputs.text id="email" name="email" type="email" label="{{ __('Email') }}"
                    placeholder="{{ __('matt@damon.com') }}" :required="true" autofocus />

                <x-button-auth button="{{ __('Email Password Reset Link') }}" />
            </form>
        </div>
    </main>
</x-layouts.master>
