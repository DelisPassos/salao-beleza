<section class="py-4">
    <header>
        <h2 class="h5 fw-semibold text-warning">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-2 text-white-50 small">
            {{ __('Uma vez que sua conta for excluída, todos os seus dados serão apagados permanentemente. Faça o download de qualquer informação que deseje manter antes de prosseguir.') }}
        </p>
    </header>

    {{-- Botão que abre o modal do Bootstrap --}}
    <button
        type="button"
        class="btn btn-danger mt-3"
        data-bs-toggle="modal"
        data-bs-target="#confirm-user-deletion"
    >
        {{ __('Excluir Conta') }}
    </button>

    {{-- Modal de confirmação --}}
    <x-modals.confirm-delete
        id="confirm-user-deletion"
        :route="route('profile.destroy')"
        item="sua conta"
        title="Excluir Conta"
        :show="false"
        buttonText="Excluir Conta"
    >
        <div class="mt-3">
            <x-forms.input-label for="password" :value="__('Senha')" class="visually-hidden" />

            <x-forms.text-input
                id="password"
                name="password"
                type="password"
                placeholder="Informe sua senha para confirmar"
                class="form-control bg-black text-white border-warning"
            />

            <x-forms.input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-warning" />
        </div>
    </x-modals.confirm-delete>
</section>
