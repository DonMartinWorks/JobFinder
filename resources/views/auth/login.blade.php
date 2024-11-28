<x-layouts.master>
    <x-slot name="title">
        {{ __('Login') }}
    </x-slot>

    <main class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
            <h2 class="text-4xl text-center font-bold mb-4">
                {{ __('Login') }}
            </h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <x-inputs.text id="email" name="email" type="email" label="{{ __('Email') }}"
                    placeholder="{{ __('matt@damon.com') }}" :required="true" />

                <!-- Password -->
                <x-inputs.text id="password" name="password" type="password" label="{{ __('Password') }}"
                    :required="true" />

                <!-- Remember me -->
                <x-inputs.checkbox id="remember_me" name="remember" label="{{ __('Remember me') }}"
                    checked="{{ old('remember') }}" class="block my-4"
                    class3="rounded p-2 border-gray-300 text-blue-600 shadow-sm focus:ring-blue-600"
                    class4="ms-2 text-md text-gray-600" />

                <x-button-auth />

                <p class="mt-4 text-gray-500">
                    @if (Route::has('password.request'))
                        <a class="md:block transition-all text-gray-700 text-md focus:text-blue-500 focus:font-semibold hover:text-blue-500 flex items-center"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </p>
            </form>
        </div>
    </main>
</x-layouts.master>
