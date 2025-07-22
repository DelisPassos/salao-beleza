<nav class="navbar navbar-expand-lg bg-black border-bottom border-warning">
    <div class="container">
        {{-- Logo --}}
        <x-layout.application-logo private />

        {{-- Botão colapsável (mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Itens da barra de navegação --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Links à esquerda --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- Painel --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-1"></i> Painel
                    </x-buttons.nav-link>
                </li>

                {{-- Clientes --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('clientes.*')" href="{{ route('clientes.index') }}">
                        <i class="bi bi-person-lines-fill me-1"></i> Clientes
                    </x-buttons.nav-link>
                </li>

                {{-- Serviços --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('servicos.*')" href="{{ route('servicos.index') }}">
                        <i class="bi bi-scissors me-1"></i> Serviços
                    </x-buttons.nav-link>
                </li>

                {{-- Fornecedores --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('fornecedores.*')" href="{{ route('fornecedores.index') }}">
                        <i class="bi bi-truck me-1"></i> Fornecedores
                    </x-buttons.nav-link>
                </li>

                {{-- Produtos --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('produtos.*')" href="{{ route('produtos.index') }}">
                        <i class="bi bi-box-seam me-1"></i> Produtos
                    </x-buttons.nav-link>
                </li>

                {{-- Atendimentos --}}
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('atendimentos.*')" href="{{ route('atendimentos.index') }}">
                        <i class="bi bi-calendar-check me-1"></i> Atendimentos
                    </x-buttons.nav-link>
                </li>
            </ul>

            {{-- Links à direita --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <x-dropdowns.dropdown>
                        {{-- Gatilho do dropdown --}}
                        <x-slot name="trigger">
                            <span class="text-warning" style="cursor: pointer;">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </span>
                        </x-slot>

                        {{-- Link para perfil --}}
                        <x-buttons.dropdown-link href="{{ route('profile.edit') }}">
                            <i class="bi bi-gear me-1"></i> Perfil
                        </x-buttons.dropdown-link>

                        {{-- Botão de logout (funcional) --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning w-100 text-start d-flex align-items-center btn-hover-warning'">
                                <i class="bi bi-box-arrow-right me-1"></i> Sair
                            </button>
                        </form>
                    </x-dropdowns.dropdown>
                </li>
            </ul>
        </div>
    </div>
</nav>
