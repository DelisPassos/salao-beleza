@props(['active'])

@php
$classes = ($active ?? false)
    ? 'nav-link active border-bottom border-warning text-warning fw-semibold'
    : 'nav-link text-white-50 hover-text-warning';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
