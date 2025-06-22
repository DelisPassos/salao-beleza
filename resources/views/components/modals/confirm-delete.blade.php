@props([
    'id',
    'route',
    'item' => 'este item',
    'title' => 'Confirmar Exclusão',
    'message' => null,
    'buttonText' => 'Excluir',
    'buttonClass' => 'btn btn-danger d-inline-flex align-items-center'
])

@php
    $message = $message ?? "Tem certeza que deseja excluir <strong>{$item}</strong>?";
@endphp

<x-layout.modal id="{{ $id }}">
    <x-slot name="header">
        {{ $title }}
    </x-slot>

    {!! $message !!}

    {{ $slot }}

    <x-slot name="footer">
        <form action="{{ $route }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
            </button>

            <button type="submit" class="{{ $buttonClass }}">
                <i class="bi bi-trash me-1"></i> {{ $buttonText }}
            </button>
        </form>
    </x-slot>
</x-layout.modal>
