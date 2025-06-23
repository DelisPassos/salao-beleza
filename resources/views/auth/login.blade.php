<x-guest-layout>
    <x-cards.card-t-public title="Entrar">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <x-forms.input-label for="email" :value="'Email'" />
                <x-forms.text-input id="email" type="email" name="email"
                              class="w-100"
                              :value="old('email')" required autofocus />
                <x-forms.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Senha -->
            <div class="mb-3">
                <x-forms.input-label for="password" :value="'Senha'" />
                <x-forms.text-input id="password" type="password" name="password"
                              class="w-100"
                              required autocomplete="current-password" />
                <x-forms.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Lembrar-me -->
            <div class="form-check mb-3">
                <input class="form-check-input bg-black border-white text-warning" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label text-white-50 ms-1" for="remember_me">
                    {{ __('Lembrar-me') }}
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-white-50 small text-decoration-none hover-text-warning" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-buttons.primary-button>
                    {{ __('Entrar') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-cards.card-t-public>
</x-guest-layout>
