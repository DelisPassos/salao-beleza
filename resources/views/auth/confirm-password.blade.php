<x-guest-layout>
    <div class="mb-4 text-white-50 small text-center">
        Esta é uma área segura do sistema. Confirme sua senha antes de continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Senha -->
        <div class="mb-3">
            <x-forms.input-label for="password" :value="'Senha'" />

            <x-forms.text-input id="password" class="w-100"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

            <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-end">
            <x-buttons.primary-button>
                Confirmar
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
