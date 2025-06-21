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
                <li class="nav-item">
                    <x-buttons.nav-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
                        La Belle
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

                        {{-- Conteúdo do dropdown --}}
                        <x-buttons.dropdown-link href="{{ route('profile.edit') }}">
                            <i class="bi bi-gear me-1"></i> Perfil
                        </x-buttons.dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-buttons.dropdown-link as="button">
                                <i class="bi bi-box-arrow-right me-1"></i> Sair
                            </x-buttons.dropdown-link>
                        </form>
                    </x-dropdowns.dropdown>
                </li>
            </ul>
        </div>
    </div>
</nav>
