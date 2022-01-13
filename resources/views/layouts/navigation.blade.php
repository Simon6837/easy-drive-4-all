<nav class="flex items-center justify-between bg-gray-800 h-20 shadow-2xl">
    <div class="logo h-100" >
        <img src="assets/logo.png">
    </div>
    <ul class="flex">
        <li>
            <a class="text-white mr-4 bg-gray-500 pt-4 p-4 pr-5 pl-5 hover:bg-gray-600 transition-all rounded" href="{{route('home')}}"><i class="fas fa-home"></i> Home </a>
        </li>
        <li>
            <a class="text-white mr-4 bg-gray-500 pt-4 p-4 pr-5 pl-5 hover:bg-gray-600 transition-all rounded" href="{{route('cars')}}"><i class="fas fa-car"></i> Auto's </a>
        </li>
        <li>
            <a class="text-white mr-4 bg-gray-500 pt-4 p-4 pr-5 pl-5 hover:bg-gray-600 transition-all rounded" href="{{route('services')}}"><i class="fas fa-briefcase"></i> Diensten </a>
        </li>
        <li>
            <a class="text-white mr-4 bg-gray-500 pt-4 p-4 pr-5 pl-5 hover:bg-gray-600 transition-all rounded" href="{{route('aboutus')}}"><i class="fas fa-question"></i> Over ons </a>
        </li>
        <li>
            <a class="text-white mr-4 bg-gray-500 pt-4 p-4 pr-5 pl-5 hover:bg-gray-600 transition-all rounded" href="{{route('contact')}}"><i class="fas fa-reply"></i> Contact </a>
        </li>
        @if (Auth::user())
            <div class="sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex p-1 items-center text-sm font-medium text-gray-300 hover:border-gray-300 focus:outline-none focus:text-white focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>Hallo, {{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('account')">
                                Account pagina
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @else
            <x-nav-link style="color: rgba(229, 231, 235);" class="text-sm font-medium text-gray-200 transition-colors duration-300 transform" :href="route('login')" :active="request()->routeIs('login')">Inloggen</x-nav-link>
        @endif
    </ul>
</nav>
