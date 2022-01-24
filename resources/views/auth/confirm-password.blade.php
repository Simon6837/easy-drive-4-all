<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="align-content-center items-center justify-between">
            <a href="/"><img class="spin m-2 h-14 fill-current" src="{{URL('assets/logo-short.jpg')}}"></a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Dit is een afgeschermd gedeelte van de website. Log opnieuw in om dit te kunnen zien.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Wachtwoord')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Bevestigen') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
