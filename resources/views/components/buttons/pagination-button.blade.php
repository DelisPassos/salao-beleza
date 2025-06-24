@if ($paginator->hasPages())
    <div class="d-flex justify-content-center gap-2 flex-wrap mb-3">
        {{-- Botão "Anterior" --}}
        @if ($paginator->onFirstPage())
            <button class="btn btn-sm btn-outline-warning" disabled>
                <i class="bi bi-arrow-left-circle me-1"></i> Anterior
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-outline-warning">
                <i class="bi bi-arrow-left-circle me-1"></i> Anterior
            </a>
        @endif

        {{-- Números de página --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="btn btn-sm btn-outline-secondary disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="btn btn-sm btn-warning">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="btn btn-sm btn-outline-warning">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Botão "Próximo" --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-outline-warning">
                Próximo <i class="bi bi-arrow-right-circle ms-1"></i>
            </a>
        @else
            <button class="btn btn-sm btn-outline-warning" disabled>
                Próximo <i class="bi bi-arrow-right-circle ms-1"></i>
            </button>
        @endif
    </div>
@endif
