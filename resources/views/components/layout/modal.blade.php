@props(['name', 'show' => false, 'maxWidth' => 'lg'])

@php
$modalId = $name;
$maxWidthClass = match ($maxWidth) {
    'sm' => 'modal-sm',
    'md' => '',
    'lg' => 'modal-lg',
    'xl' => 'modal-xl',
    default => '',
};
@endphp

<div class="modal fade {{ $show ? 'show d-block' : '' }}" id="{{ $modalId }}" tabindex="-1" aria-hidden="{{ $show ? 'false' : 'true' }}" style="{{ $show ? 'background-color: rgba(0,0,0,0.5);' : '' }}">
  <div class="modal-dialog {{ $maxWidthClass }} modal-dialog-centered">
    <div class="modal-content bg-black text-white border-warning">
      <div class="modal-header border-warning">
        {{ $header ?? '' }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      <div class="modal-footer border-warning">
        {{ $footer ?? '' }}
      </div>
    </div>
  </div>
</div>
