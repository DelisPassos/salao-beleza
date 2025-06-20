<x-guest-layout>
    <x-auth-card title="Redefinir Senha">
        
        <div class="mb-4 text-center text-white-50 small">
            Esqueceu sua senha? Sem problemas. Informe seu e-mail e escolha uma nova senha.
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Token oculto -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" type="email" name="email"
                              class="w-100"
                              :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Nova Senha -->
            <div class="mb-3">
                <x-input-label for="password" :value="'Nova Senha'" />
                <x-text-input id="password" type="password" name="password"
                              class="w-100"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="'Confirmar Nova Senha'" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                              class="w-100"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center">
                <x-primary-button>
                    Redefinir Senha
                </x-primary-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
