<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold text-dark mb-0">Dashboard</h2>
    </x-slot>

    <div class="container py-4">
        {{-- Boas-vindas --}}
        <div class="alert alert-info">
            Bem-vindo(a), {{ Auth::user()->name }}! Escolha uma opção abaixo para começar.
        </div>

        {{-- Painel de Indicadores --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Vendas do Dia</h5>
                        <p class="card-text">R$ {{ $vendasHoje ?? '0,00' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Serviço + Popular</h5>
                        <p class="card-text">{{ $servicoPopular ?? 'Nenhum' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Clientes Ativos</h5>
                        <p class="card-text">{{ $clientesAtivos ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Atendimentos Hoje</h5>
                        <p class="card-text">{{ $atendimentosHoje ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Acessos rápidos --}}
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <a href="{{ route('servicos.index') }}" class="btn btn-outline-dark w-100">
                    <i class="bi bi-scissors"></i> Serviços
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('fornecedores.index') }}" class="btn btn-outline-dark w-100">
                    <i class="bi bi-truck"></i> Fornecedores
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark w-100">
                    <i class="bi bi-person"></i> Clientes
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('atendimentos.index') }}" class="btn btn-outline-dark w-100">
                    <i class="bi bi-calendar-check"></i> Atendimentos
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
