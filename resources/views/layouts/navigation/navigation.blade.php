<header class="bg-gray-800" x-data="{ isOpen: false }">
    <nav class="container px-6 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a href="/"><img class="spin m-2 h-14 fill-current" src="{{URL('assets/logo-short.jpg')}}"></a>

            <a class="text-xl font-bold text-white transition-colors duration-300 transform md:text-2x
                    " href="/">EasyDrive4All</a>
            <!-- Mobile menu button -->
            <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd"
                              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div :class="isOpen ? 'flex' : 'hidden'"
             class="flex-col mt-2 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
            {{--            Menu items here--}}
            @include('layouts.navigation.menuItems')
            @if (Auth::user())
                <div class="sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex p-1 items-center text-sm font-medium text-gray-300 hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out">
                                @role('student')
                                <div class="text-left w-max md:w-min lg:w-max">
                                    Hallo, leerling 
                                    <div class="inline-block w-24 md:w-24 md:max-w-24 lg:w-24 lg:max-w-36 2xl:w-24 2xl:w-max-60 text-ellipsis overflow-hidden align-top">
                                        {{ Auth::user()->first_name }}
                                    </div>
                                </div>
                                @endrole
                                @role('instructor')
                                <div class="text-left w-max md:w-min lg:w-max">
                                    Hallo, instructeur 
                                    <div class="inline-block w-24 md:w-24 md:max-w-24 lg:w-24 lg:max-w-36 2xl:w-24 2xl:w-max-60 text-ellipsis overflow-hidden align-top">
                                        {{ Auth::user()->first_name }}
                                    </div>
                                </div>
                                @endrole
                                @role('owner')
                                <div class="text-left w-max md:w-min lg:w-max">
                                    Hallo, eigenaar 
                                    <div class="inline-block w-24 md:w-24 md:max-w-24 lg:w-24 lg:max-w-36 2xl:w-24 2xl:w-max-60 text-ellipsis overflow-hidden align-top">
                                        {{ Auth::user()->first_name }}
                                    </div>
                                </div>
                                @endrole

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        @include('layouts.navigation.dropdownItems')
                    </x-dropdown>
                </div>
            @else
                {{--                <x-nav-link style="color: rgba(229, 231, 235);" class="text-sm font-medium text-gray-200 transition-colors duration-300 transform" :href="route('register')" :active="request()->routeIs('register')">Register</x-nav-link>--}}
                <x-nav-link style="color: rgba(229, 231, 235);"
                            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
                            :href="route('login')" :active="request()->routeIs('login')">Login
                </x-nav-link>
            @endif
        </div>
    </nav>
</header>
<style>
    .spin:hover {
        -webkit-animation: spin 1s linear;
        animation: spin 1s linear;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
