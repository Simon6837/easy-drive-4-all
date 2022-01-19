<x-nav-link style="color: rgba(229, 231, 235);"
            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
            :href="route('home')" :active="request()->routeIs('home')">Home
</x-nav-link>
<x-nav-link style="color: rgba(229, 231, 235);"
            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
            :href="route('cars')" :active="request()->routeIs('cars')">Auto's
</x-nav-link>
<x-nav-link style="color: rgba(229, 231, 235);"
            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
            :href="route('services')" :active="request()->routeIs('services')">Diensten
</x-nav-link>
<x-nav-link style="color: rgba(229, 231, 235);"
            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
            :href="route('aboutus')" :active="request()->routeIs('aboutus')">Over ons
</x-nav-link>
<x-nav-link style="color: rgba(229, 231, 235);"
            class="text-sm font-medium text-gray-200 transition-colors duration-300 transform"
            :href="route('contact')" :active="request()->routeIs('contact')">Contact
</x-nav-link>
