@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-white fw-semibold']) }}>
    {{ $value ?? $slot }}
</label>
