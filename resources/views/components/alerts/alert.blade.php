@props([
    'type' => 'info',  // tipos: success, danger, warning, info
    'message',
])

@if ($message)
    <div {{ $attributes->merge(['class' => "alert alert-{$type} alert-dismissible fade show mt-3"]) }} role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
@endif
