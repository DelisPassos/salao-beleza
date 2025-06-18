@props(['id', 'name', 'icon', 'value' => '', 'error' => ''])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label text-white">{{ ucfirst($name) }}</label>
    <div class="input-group">
        <span class="input-group-text bg-black text-white border-white">
            <i class="bi bi-{{ $icon }}"></i>
        </span>
        <input type="text" id="{{ $id }}" name="{{ $name }}"
               class="form-control bg-black text-white border-white {{ $error ? 'is-invalid' : '' }}"
               value="{{ old($name, $value) }}">
    </div>
    @if ($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>
