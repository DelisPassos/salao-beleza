<x-guest-layout>
    <x-cards.card-t-public title="Verificação de E-mail">
        <div class="mb-4 text-white-50 small text-center">
            Obrigado por se registrar! Antes de começar, verifique seu endereço de e-mail clicando no link que enviamos. Se você não recebeu o e-mail, podemos enviar outro.
        </div>

        @if (session('status') == 'verification-link-sent')
            <x-alerts.alert type="success" message="Um novo link de verificação foi enviado para o e-mail fornecido durante o registro." />
        @endif

        <div class="d-flex justify-content-between mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-buttons.primary-button>
                    Reenviar E-mail de Verificação
                </x-buttons.primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Sair
                </button>
            </form>
        </div>
    </x-cards.card-t-public>
</x-guest-layout>
