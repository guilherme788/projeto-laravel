@extends('layouts.main')

@section('contenido')
<div class="container mt-5">
    <h2 class="text-light text-center mb-4">Informações do Usuário: <strong>{{ $item->name }}</strong></h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark border-0 shadow-lg rounded-4">
                <div class="card-body">
                    <table class="table table-dark table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Senha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->password }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('index') }}" class="btn btn-outline-light rounded-pill shadow-sm">
                            <i class="fa-solid fa-arrow-left me-2"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
