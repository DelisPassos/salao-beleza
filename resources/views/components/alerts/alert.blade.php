@props([
    'type' => 'info', // tipos: success, danger, warning, info
    'message' => null,
])

@php
    $conteudo = $message ?? $slot;
@endphp

@if (trim($conteudo))
    <div {{ $attributes->merge(['class' => "alert alert-{$type} alert-dismissible fade show mt-3"]) }} role="alert">
        {{ $conteudo }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
@endif
