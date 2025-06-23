<section>
    <header>
        <h2 class="text-lg fw-semibold text-warning">
            Informações do Perfil
        </h2>

        <p class="mt-1 text-sm text-white-50">
            Atualize as informações do seu perfil e o endereço de e-mail.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-forms.input-label for="name" value="Nome" />
            <x-forms.text-input 
                id="name" 
                name="name" 
                type="text" 
                class="form-control bg-black text-white border-warning mt-1" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-forms.input-error class="mt-2 text-warning" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-forms.input-label for="email" value="E-mail" />
            <x-forms.text-input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control bg-black text-white border-warning mt-1" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-forms.input-error class="mt-2 text-warning" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 text-warning small">
                    <p>
                        Seu endereço de e-mail ainda não foi verificado.
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline text-warning text-decoration-underline">
                            Clique aqui para reenviar o e-mail de verificação.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-success">
                            Um novo link de verificação foi enviado para seu e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <x-buttons.primary-button>Salvar</x-buttons.primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white-50 mb-0"
                >Alterações salvas.</p>
            @endif
        </div>
    </form>
</section>
