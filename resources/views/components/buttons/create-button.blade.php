{{-- components/create-button.blade.php --}}
@props(['href', 'icon' => 'plus-circle', 'label'])

<a href="{{ $href }}" class="btn btn-sm btn-outline-warning mb-3">
    <i class="bi bi-{{ $icon }} me-1"></i> {{ $label }}
</a>
