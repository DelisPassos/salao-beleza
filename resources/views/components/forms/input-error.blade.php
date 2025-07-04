@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger mb-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
