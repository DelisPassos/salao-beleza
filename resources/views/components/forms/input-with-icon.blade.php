@props([
    'id',
    'name',
    'icon',
    'type' => 'text',
    'value' => '',
    'error' => '',
])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label text-white">{{ ucfirst($name) }}</label>
    <div class="input-group">
        <span class="input-group-text bg-black text-white border-white">
            <i class="bi bi-{{ $icon }}"></i>
        </span>
        <input
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ old($name, $value) }}"
            {{ $attributes->merge(['class' => 'form-control bg-black text-white border-white' . ($error ? ' is-invalid' : '')]) }}
        >
    </div>
    @if ($error)
        <div class="invalid-feedback d-block">
            {{ $error }}
        </div>
    @endif
</div>
