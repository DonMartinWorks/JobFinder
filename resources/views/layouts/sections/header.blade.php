<header class="bg-blue-900 text-white p-3" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}" class="text-white hover:text-gray-50 hover:rounded-lg transition-all">
                {{ config('app.name', 'Laravel') }}
            </a>
        </h1>

        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url="{{ url('/') }}" :active="request()->is('/')">
                {{ __('Home') }}
            </x-nav-link>

            <x-nav-link url="{{ route('jobs.index') }}" :active="Route::currentRouteNamed('jobs.index')">
                {{ __('All Jobs') }}
            </x-nav-link>

            @auth
                <x-nav-link url="#" :active="Route::currentRouteNamed('#')">
                    {{ __('Saved Jobs') }}
                </x-nav-link>
            @endauth

            @guest
                <x-nav-link url="{{ route('login') }}" :active="Route::currentRouteNamed('login')" icon="fa-solid fa-user">
                    {{ __('Login') }}
                </x-nav-link>

                <x-nav-link url="{{ route('register') }}" :active="Route::currentRouteNamed('register')">
                    {{ __('Register') }}
                </x-nav-link>
            @endguest

            @auth
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}">
                        @if (Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full">
                        @else
                            <img src="{{ asset('imgs/avatar2.webp') }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full">
                        @endif
                    </a>
                </div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link url="{{ route('logout') }}" icon="fa-solid fa-right-from-bracket"
                        title="{{ __('Log Out') }}"
                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>

                <x-button-link url="{{ route('job.create') }}" icon="edit" rounded="rounded-sm" :block="true">
                    {{ __('Create Job') }}
                </x-button-link>
            @endauth
        </nav>

        <button @click="open = !open" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <nav x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
        x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 max-h-screen"
        x-transition:leave-end="opacity-0 max-h-0"
        class="md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2 overflow-hidden">
        <x-nav-link url="{{ url('/') }}" :mobile="true" :active="request()->is('/')">
            {{ __('Home') }}
        </x-nav-link>

        <x-nav-link url="{{ route('jobs.index') }}" :mobile="true" :active="Route::currentRouteNamed('jobs.index')">
            {{ __('All Jobs') }}
        </x-nav-link>

        @auth
            <x-nav-link url="#" :mobile="true" :active="Route::currentRouteNamed('#')">
                {{ __('Saved Jobs') }}
            </x-nav-link>
        @endauth

        @guest
            <x-nav-link url="{{ route('login') }}" :mobile="true" :active="Route::currentRouteNamed('login')" icon="fa-solid fa-user">
                {{ __('Login') }}
            </x-nav-link>

            <x-nav-link url="{{ route('register') }}" :mobile="true" :active="Route::currentRouteNamed('register')">
                {{ __('Register') }}
            </x-nav-link>
        @endguest

        @auth
            <x-nav-link url="{{ route('dashboard') }}" :mobile="true" :active="Route::currentRouteNamed('dashboard')"
                icon="fa-regular fa-address-card">
                {{ __('Dashboard') }}
            </x-nav-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :mobile="true" url="{{ route('logout') }}" icon="fa-regular fa-circle-xmark"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>

            <x-button-link url="{{ route('job.create') }}" icon="fa-solid fa-plus" rounded="rounded-sm" :block="true">
                {{ __('Create Job') }}
            </x-button-link>
        @endauth
    </nav>
</header>
