<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold text-warning">
            Cadastrar Novo Cliente
        </h2>
    </x-slot>

    <div class="py-5 bg-black text-white">
        <div class="container">
            <div class="card bg-dark bg-opacity-75 text-white shadow-lg border-0">
                <div class="card-body">

                    {{-- Exibe erros de validação --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nome" class="form-label text-white">Nome</label>
                            <div class="input-group">
                                <span class="input-group-text bg-black text-white border-white">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            <input type="text" id="nome" name="nome"
                                class="form-control bg-black text-white border-white @error('nome') is-invalid @enderror"
                                value="{{ old('nome') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-black text-white border-white">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" id="email" name="email"
                                    class="form-control bg-black text-white border-white @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="form-label text-white">Telefone</label>
                            <div class="input-group">
                                <span class="input-group-text bg-black text-white border-white">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input type="text" id="telefone" name="telefone"
                                    class="form-control bg-black text-white border-white @error('telefone') is-invalid @enderror"
                                    value="{{ old('telefone') }}">
                                </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-warning">
                                <i class="bi bi-arrow-left-circle me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning text-black fw-semibold">
                                <i class="bi bi-check-circle-fill me-1"></i> Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
