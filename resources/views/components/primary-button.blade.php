<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'btn btn-warning text-black fw-semibold text-uppercase px-4 py-2 shadow-sm ' .
               'border-0 ' .
               'hover-bg-warning-dark focus-bg-warning-dark active-bg-warning-darker ' .
               'focus-ring-warning transition']) }}>
    {{ $slot }}
</button>
