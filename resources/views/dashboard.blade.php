<x-app-layout>
    <x-layout.header title="Painel de Indicadores" />

    <div class="container py-4">
        {{-- Boas-vindas --}}
        <x-alerts.alert type="info" :message="'Bem-vindo(a), ' . Auth::user()->name . '!'" />

        {{-- Estatísticas do Dia --}}
        <h4 class="text-white fw-bold mb-3">Estatísticas do Dia</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            {{-- Receita do Dia --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-primary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Receita do Dia</h5>
                        <p class="mb-0">R$ {{ number_format($vendasHoje ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Custo com Produtos do Dia --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-danger d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Custo com Produtos Hoje</h5>
                        <p class="mb-0">R$ {{ number_format($custoProdutosDia ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Lucro do Dia --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-success d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Lucro do Dia</h5>
                        <p class="mb-0">R$ {{ number_format(($vendasHoje ?? 0) - ($custoProdutosDia ?? 0), 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Atendimentos do Dia --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-warning d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Atendimentos do Dia</h5>
                        <p class="mb-0">{{ $atendimentosHoje ?? 0 }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>
        </div>


        {{-- Estatísticas do Mês --}}
        <h4 class="text-white fw-bold mb-3">Estatísticas do Mês</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            {{-- Receita Mensal --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-primary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Receita Mensal</h5>
                        <p class="mb-0">R$ {{ number_format($receitaMensal ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Custo com Produtos do Mês --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-danger d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Custo com Produtos</h5>
                        <p class="mb-0">R$ {{ number_format($custoProdutosMes ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Lucro do Mês --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-success d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Lucro do Mês</h5>
                        <p class="mb-0">R$ {{ number_format($lucroMes ?? 0, 2, ',', '.') }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Atendimentos no Mês --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-warning d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Atendimentos no Mês</h5>
                        <p class="mb-0">{{ $totalAtendimentosMes ?? 0 }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>
        </div>

        {{-- Outras Informações --}}
        <h4 class="text-white fw-bold mb-3">Outras Informações</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            {{-- Serviço mais realizado --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-primary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Serviço Mais Realizado</h5>
                        <p class="mb-0">{{ $servicoPopular ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Profissional destaque --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-info d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Profissional Destaque do Mês</h5>
                        <p class="mb-0">{{ $profissionalTop?->name ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Clientes cadastrados --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-success d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Clientes Cadastrados</h5>
                        <p class="mb-0">{{ $clientesAtivos ?? 0 }}</p>
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

            {{-- Estoque Total --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-secondary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Estoque Total</h5>
                        <p class="mb-0">{{ $estoqueTotal }} unidade(s)</p>
                    </div>
                </x-cards.card-t-privado>
            </div>

            {{-- Produto Mais Usado --}}
            <div class="col">
                <x-cards.card-t-privado class="h-100">
                    <div class="text-secondary d-flex flex-column justify-content-between h-100">
                        <h5 class="fw-bold">Produto Mais Usado</h5>
                        <p class="mb-0">{{ $produtosMaisUsados ?? 'Nenhum' }}</p>
                    </div>
                </x-cards.card-t-privado>
            </div>
        </div>
        {{-- Produtos com Estoque Baixo (detalhado) --}}
<h4 class="text-white fw-bold mb-3">Produtos com Estoque Baixo</h4>
<div class="table-responsive mb-4">
    <table class="table table-dark table-bordered table-striped">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade em Estoque</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estoqueBaixoDetalhado as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Nenhum produto com estoque baixo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    </div>
</x-app-layout>
