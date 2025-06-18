<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn btn-danger btn-sm d-inline-flex align-items-center gap-1'
]) }}>
    <i class="bi bi-trash"></i> {{ $slot }}
</button>
