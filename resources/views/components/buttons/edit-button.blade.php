<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn btn-warning btn-sm d-inline-flex align-items-center fw-semibold text-uppercase'
    ]) }}>
    <i class="bi bi-pencil-square me-1"></i> {{ $slot }}
</button>
