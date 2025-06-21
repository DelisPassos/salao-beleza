<x-guest-layout>
    <x-cards.card-t-public title="Redefinir Senha">
        
        <div class="mb-4 text-center text-white-50 small">
            Esqueceu sua senha? Sem problemas. Informe seu e-mail e escolha uma nova senha.
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token oculto -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <x-forms.input-label for="email" :value="'Email'" />
                <x-forms.text-input id="email" type="email" name="email"
                                    class="w-100"
                                    :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Nova Senha -->
            <div class="mb-3">
                <x-forms.input-label for="password" :value="'Nova Senha'" />
                <x-forms.text-input id="password" type="password" name="password"
                                    class="w-100"
                                    required autocomplete="new-password" />
                <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-4">
                <x-forms.input-label for="password_confirmation" :value="'Confirmar Nova Senha'" />
                <x-forms.text-input id="password_confirmation" type="password" name="password_confirmation"
                                    class="w-100"
                                    required autocomplete="new-password" />
                <x-forms.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center">
                <x-buttons.primary-button>
                    Redefinir Senha
                </x-buttons.primary-button>
            </div>
        </form>

    </x-cards.card-t-public>
</x-guest-layout>
