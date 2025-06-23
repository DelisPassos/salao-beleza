@props(['align' => 'right'])

@php
$dropdownAlign = $align === 'left' ? 'dropdown-menu-start' : 'dropdown-menu-end';
@endphp

<div class="dropdown">
    <div {{ $attributes->merge(['class' => 'nav-link dropdown-toggle text-warning']) }} data-bs-toggle="dropdown" style="cursor: pointer;">
        {{ $trigger }}
    </div>

    <ul class="dropdown-menu bg-black {{ $dropdownAlign }}">
        {{ $slot }}
    </ul>
</div>
