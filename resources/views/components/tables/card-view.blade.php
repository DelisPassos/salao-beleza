@props([
    'items' => [],
    'fields' => [],     // ['Label' => 'atributo' OU fn($item)]
    'actions' => null,  // fn($item) => HTML
])

@forelse($items as $item)
    <div class="card bg-dark text-white border border-warning mb-3">
        <div class="card-body">
            @foreach ($fields as $label => $field)
                @php
                    $value = is_callable($field) ? $field($item) : data_get($item, $field, '—');
                @endphp
                <p class="card-text small mb-1">
                    <strong>{{ $label }}:</strong> {{ $value }}
                </p>
            @endforeach

            @if ($actions)
                <div class="d-flex justify-content-center gap-2 mt-2">
                    {!! $actions($item) !!}
                </div>
            @endif
        </div>
    </div>
@empty
    <p class="text-white text-center">Nenhum registro encontrado.</p>
@endforelse
