<x-guest-layout>
    <x-auth-card title="Criar Conta">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nome -->
            <div class="mb-3">
                <x-input-label for="name" :value="'Nome'" />
                <x-text-input id="name" type="text" name="name"
                              class="w-100"
                              :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" type="email" name="email"
                              class="w-100"
                              :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <x-input-label for="password" :value="'Senha'" />
                <x-text-input id="password" type="password" name="password"
                              class="w-100"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="'Confirmar Senha'" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                              class="w-100"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="text-white-50 small text-decoration-none">
                    Já possui conta?
                </a>

                <x-primary-button>
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
