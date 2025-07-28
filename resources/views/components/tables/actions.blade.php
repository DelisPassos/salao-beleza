@props([
    'editRoute',
    'deleteRoute',
    'modalId',
    'itemName' => 'o item',
])

<div class="d-flex flex-wrap justify-content-center gap-2">
    <a href="{{ $editRoute }}">
        <x-buttons.edit-button>Editar</x-buttons.edit-button>
    </a>

    <x-buttons.delete-button 
        data-bs-toggle="modal" 
        data-bs-target="#{{ $modalId }}">
        Excluir
    </x-buttons.delete-button>
</div>
