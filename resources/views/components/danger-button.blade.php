<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'btn btn-danger btn-sm d-inline-flex align-items-center fw-semibold text-uppercase'
    ]) }}>
    <i class="bi bi-trash me-1"></i> {{ $slot }}
</button>
