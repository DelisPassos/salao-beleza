@props(['href' => null, 'as' => 'a'])

@php
$classes = 'btn btn-outline-warning w-100 text-start d-flex align-items-center btn-hover-warning';
@endphp

@if ($as === 'button')
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
