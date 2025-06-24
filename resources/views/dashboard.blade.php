<x-app-layout>
    <x-layout.header title="Painel de Indicadores" />

    <div class="container py-4">
        {{-- Boas-vindas --}}
        <x-alerts.alert type="info" :message="'Bem-vindo(a), ' . Auth::user()->name . '!'" />

        {{-- Painel de Indicadores --}}
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            {{-- Vendas do dia --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-success d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Vendas de Hoje</h5>
                        <p class="mb-0">R$ {{ number_format($vendasHoje ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Serviço mais popular --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-primary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Serviço Mais Realizado</h5>
                        <p class="mb-0">{{ $servicoPopular ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Clientes ativos --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-warning d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Clientes Cadastrados</h5>
                        <p class="mb-0">{{ $clientesAtivos ?? 0 }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Atendimentos hoje --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-danger d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Atendimentos de Hoje</h5>
                        <p class="mb-0">{{ $atendimentosHoje ?? 0 }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Profissional mais ativo --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-info d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Profissional Destaque do Mês</h5>
                        <p class="mb-0">{{ $profissionalTop?->name ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Receita do mês --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-success d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Receita Mensal</h5>
                        <p class="mb-0">R$ {{ number_format($receitaMensal ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Produtos com estoque baixo --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-danger d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Produtos com Estoque Baixo</h5>
                        <p class="mb-0">{{ $produtosBaixoEstoque }} item(ns)</p>
                    </div>
                </x-cards.card-t-privado>
            </div>
            <div class="col-md-3">
                <a href="{{ route('produtos.index') }}" class="btn btn-outline-warning w-100">
                    <i class="bi bi-box-seam"></i> Produtos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
