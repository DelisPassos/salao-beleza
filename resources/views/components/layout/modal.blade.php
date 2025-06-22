@props(['id', 'show' => false, 'maxWidth' => 'lg'])

@php
    $modalId = $id;
    $maxWidthClass = match ($maxWidth) {
        'sm' => 'modal-sm',
        'md' => '',
        'lg' => 'modal-lg',
        'xl' => 'modal-xl',
        default => '',
    };
@endphp

<div class="modal fade {{ $show ? 'show d-block' : '' }}"
     id="{{ $modalId }}"
     tabindex="-1"
     @if($show)
        style="display: block; background-color: rgba(0, 0, 0, 0.5);"
     @endif
     role="dialog"
     aria-labelledby="{{ $modalId }}Label"
     aria-modal="true">
     
  <div class="modal-dialog {{ $maxWidthClass }} modal-dialog-centered" role="document">
    <div class="modal-content bg-black text-white border-warning">

      <div class="modal-header border-warning">
        @isset($header)
            <h5 class="modal-title" id="{{ $modalId }}Label">{{ $header }}</h5>
        @endisset

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        {{ $slot }}
      </div>

      <div class="modal-footer border-warning">
        @isset($footer)
            {{ $footer }}
        @endisset
      </div>
    </div>
  </div>
</div>
