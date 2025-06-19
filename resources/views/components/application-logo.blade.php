@props(['public' => false])

@if ($public)
    {{-- Logo para telas públicas (login, registro, etc) --}}
    <div class="text-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('logo.png') }}" alt="Logo La Bella" style="height: 200px;">
        </a>
    </div>
@else
    {{-- Logo usada na navegação da área logada --}}
    <a class="navbar-brand text-warning d-flex align-items-center" href="{{ route('dashboard') }}">
        <img src="{{ asset('logo.png') }}" alt="Logo La Bella" style="height: 40px;">
    </a>
@endif
