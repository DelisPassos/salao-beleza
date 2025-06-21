<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>La Belle</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-black text-white d-flex justify-content-center align-items-center min-vh-100">
    
    <div class="container" style="max-width: 400px;">
        <div class="m-3"><x-layout.application-logo public/></div>
        <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0 p-4">
            {{-- Mensagem de boas-vindas --}}
            <h2 class="text-center text-warning fw-bold mb-2">Bem-vindo ao La Belle</h2>
            <p class="text-center text-white-50 mb-4">Seu sistema de gestão para salão de beleza.</p>

            {{-- Botões --}}
            @if (Route::has('login'))
                <div class="d-grid gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-warning fw-semibold text-black">
                            <i class="bi bi-speedometer2 me-1"></i> Acessar Painel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-warning fw-semibold">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-warning fw-semibold">
                                <i class="bi bi-person-plus me-1"></i> Registrar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </div>

</body>
</html>
