@props(['type' => 'button'])

<button 
    {{ $attributes->merge([
        'type' => $type, 
        'class' => 'btn btn-gold d-inline-flex align-items-center gap-2'
    ]) }}
>
    {{ $slot }}
</button>