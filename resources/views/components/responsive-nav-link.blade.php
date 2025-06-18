@props(['active' => false])

@php
$classes = $active
    ? 'd-block w-100 ps-3 pe-4 py-2 border-start border-4 border-warning text-start text-white bg-warning bg-opacity-25 fw-semibold text-decoration-none'
    : 'd-block w-100 ps-3 pe-4 py-2 border-start border-4 border-transparent text-start text-white-75 text-decoration-none hover-bg-warning hover-bg-opacity-10';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
