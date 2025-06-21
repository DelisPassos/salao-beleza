@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success fw-semibold small']) }}>
        {{ $status }}
    </div>
@endif
