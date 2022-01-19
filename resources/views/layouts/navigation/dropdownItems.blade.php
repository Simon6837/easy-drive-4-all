<x-slot name="content">
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        {{--        Menu items top all roles--}}
        <x-dropdown-link :href="route('dashboard')">
            Dashboard
        </x-dropdown-link>
        {{--        Menu items for owner--}}
        @role('owner')
        <x-dropdown-link :href="route('studentindex')">
            Studenten
        </x-dropdown-link>
        <x-dropdown-link :href="route('instructorsindex')">
            Instructeurs
        </x-dropdown-link>
        <x-dropdown-link :href="route('carsindex')">
            Auto's
        </x-dropdown-link>
        @endrole
        {{--        Menu items for instructors--}}
        @role('instructor')
        <x-dropdown-link :href="route('profile')">
            Account
        </x-dropdown-link>
        @endrole
        {{--        Menu items for students--}}
        @role('student')
        <x-dropdown-link :href="route('profile')">
            Account
        </x-dropdown-link>
        @endrole
        {{--        Menu items bottom all roles--}}
        <x-dropdown-link :href="route('notifications')">
            Meldingen
        </x-dropdown-link>
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
            {{ __('Loguit') }}
        </x-dropdown-link>
    </form>
</x-slot>
