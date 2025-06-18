@props(['type' => 'danger', 'message'])

<div class="alert alert-{{ $type }} mt-3">
    {{ $message }}
</div>
