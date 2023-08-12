<nav id="navbar" class="bg-transparent dark:bg-transparent fixed w-full z-20 top-0 left-0 transition-all duration-500">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{route('home')}}" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-700">TripMyTrip</span>
        </a>
        <div class="flex md:order-2">
            <div class="inline-flex items-center justify-between">
                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="font-semibold hover:text-blue-700 text-blue-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="font-semibold hover:text-blue-700 text-blue-500">Log In
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
                        @endif
                    @endauth
                @endif

                <button id="theme-toggle" type="button" class="text-gray-500 dark:text-white text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

            </div>
            <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 md:hidden focus:outline-none dark:text-gray-400"
                    aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                <li>
                    <x-nav-home-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-home-link>
                </li>
                <li>
                    <x-nav-home-link href="{{ route('places') }}" :active="request()->routeIs('places')">
                        {{ __('Places') }}
                    </x-nav-home-link>
                </li>
                <li>
                    <x-nav-home-link href="#">
                        {{ __('Hotels') }}
                    </x-nav-home-link>
                </li>
                <li>
                    <x-nav-home-link href="#">
                        {{ __('Vehicles') }}
                    </x-nav-home-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
