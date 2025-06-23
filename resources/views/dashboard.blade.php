<x-app-layout>
    <x-layout.header title="Painel de Indicadores" />

    <div class="container py-4">
        {{-- Boas-vindas --}}
        <x-alerts.alert type="info" :message="'Bem-vindo(a), ' . Auth::user()->name . '! Escolha uma opção abaixo para começar.'" />

        {{-- Painel de Indicadores --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <x-cards.card-t-privado>
                    <div class="text-success">
                        <h5 class="fw-bold">Vendas do Dia</h5>
                        <p class="mb-0">R$ {{ $vendasHoje ?? '0,00' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            <div class="col-md-3">
                <x-cards.card-t-privado>
                    <div class="text-primary">
                        <h5 class="fw-bold">Serviço + Popular</h5>
                        <p class="mb-0">{{ $servicoPopular ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            <div class="col-md-3">
                <x-cards.card-t-privado>
                    <div class="text-warning">
                        <h5 class="fw-bold">Clientes Ativos</h5>
                        <p class="mb-0">{{ $clientesAtivos ?? '0' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            <div class="col-md-3">
                <x-cards.card-t-privado>
                    <div class="text-danger">
                        <h5 class="fw-bold">Atendimentos Hoje</h5>
                        <p class="mb-0">{{ $atendimentosHoje ?? '0' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>
        </div>

        {{-- Acessos rápidos --}}
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <a href="{{ route('servicos.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-scissors me-1"></i> Serviços
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-truck me-1"></i> Fornecedores
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-person me-1"></i> Clientes
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('atendimentos.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-calendar-check me-1"></i> Atendimentos
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('produtos.index') }}" class="btn btn-outline-dark w-100">
                    <i class="bi bi-box-seam"></i> Produtos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
