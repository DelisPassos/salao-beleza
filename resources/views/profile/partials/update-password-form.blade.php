<section>
    <header>
        <h2 class="text-lg fw-semibold text-warning">
            Atualizar Senha
        </h2>

        <p class="mt-1 text-sm text-white-50">
            Certifique-se de usar uma senha longa e aleatória para manter sua conta segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-forms.input-label for="update_password_current_password" value="Senha Atual" />
            <x-forms.text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="form-control bg-black text-white border-warning mt-1" 
                autocomplete="current-password" 
            />
            <x-forms.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-warning" />
        </div>

        <div class="mb-3">
            <x-forms.input-label for="update_password_password" value="Nova Senha" />
            <x-forms.text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="form-control bg-black text-white border-warning mt-1" 
                autocomplete="new-password" 
            />
            <x-forms.input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-warning" />
        </div>

        <div class="mb-3">
            <x-forms.input-label for="update_password_password_confirmation" value="Confirme a Nova Senha" />
            <x-forms.text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="form-control bg-black text-white border-warning mt-1" 
                autocomplete="new-password" 
            />
            <x-forms.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-warning" />
        </div>

        <div class="d-flex align-items-center gap-3">
            <x-buttons.primary-button>Salvar</x-buttons.primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white-50 mb-0"
                >Senha atualizada com sucesso.</p>
            @endif
        </div>
    </form>
</section>
