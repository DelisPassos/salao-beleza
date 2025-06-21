<form action="{{ $action }}" method="POST">
    @csrf
    {{ $slot }}
    <div class="d-flex justify-content-between">
        <a href="{{ $cancelRoute }}" class="btn btn-outline-warning">
            <i class="bi bi-arrow-left-circle me-1"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-warning text-black fw-semibold">
            <i class="bi bi-check-circle-fill me-1"></i> Salvar
        </button>
    </div>
</form>
