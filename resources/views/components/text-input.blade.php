@props(['disabled' => false, 'type' => 'text'])

<input 
    type="{{ $type }}"
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'form-control bg-black text-white border-warning rounded shadow-sm'
    ]) }}
>
