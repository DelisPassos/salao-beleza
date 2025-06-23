<x-guest-layout>
    <x-cards.card-t-public title="Recuperar Senha">
        <div class="text-center">
            <p class="text-white-50 mb-4 small">
                Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para que você possa redefini-la.
            </p>
        </div>

        <!-- Status da sessão -->
        <x-alerts.alert :message="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <x-forms.input-label for="email" :value="'Email'" />
                <x-forms.text-input id="email" type="email" name="email"
                                    class="w-100"
                                    :value="old('email')" required autofocus />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center">
                <x-buttons.primary-button>
                    Enviar Link de Redefinição
                </x-buttons.primary-button>
            </div>
        </form>
    </x-cards.card-t-public>
</x-guest-layout>
