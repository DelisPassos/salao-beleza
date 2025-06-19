<x-guest-layout>
    <x-auth-card title="Redefinir Senha">
        
        <div class="mb-4 text-center text-white-50 small">
            Esqueceu sua senha? Sem problemas. Informe seu e-mail e escolha uma nova senha.
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <!-- ...restante do formulário -->
        </form>
        
    </x-auth-card>
</x-guest-layout>
