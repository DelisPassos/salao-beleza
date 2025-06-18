@props(['align' => 'right', 'width' => '200px', 'contentClasses' => 'py-1 bg-white'])

@php
    // Bootstrap não usa largura fixa via classes, usamos estilo inline para width
    $dropdownAlign = $align === 'left' ? 'dropdown-menu-start' : 'dropdown-menu-end';
@endphp

<div class="dropdown">
    <div {{ $attributes->merge(['class' => 'dropdown-toggle']) }} data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
        {{ $trigger }}
    </div>

    <ul class="dropdown-menu {{ $dropdownAlign }}" style="min-width: {{ $width }}; {{ $contentClasses }}">
        {{ $content }}
    </ul>
</div>
