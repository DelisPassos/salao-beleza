@props(['active' => false])

@php
$classes = $active
    ? 'nav-link active border-bottom border-warning text-warning fw-semibold'
    : 'nav-link text-warning';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
