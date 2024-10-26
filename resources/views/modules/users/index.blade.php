@extends('layouts.main')

@section('contenido')
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-4 text-light">Gerenciamento de Usuários</h1>
        <p class="text-muted">Adicione, edite e gerencie usuários de forma eficiente.</p>
    </div>

    <div class="card border-0 shadow-lg rounded-4" style="background-color: #2a2a2a;">
        <div class="card-header d-flex justify-content-between align-items-center bg-dark text-white rounded-top-4">
            <h5 class="mb-0">Lista de Usuários</h5>
            <a href="{{ route('create') }}" class="btn btn-light rounded-pill shadow-sm">
                <i class="fa-solid fa-plus me-2"></i> Adicionar Usuário
            </a>

        </div>

        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->password }}</td>
                        <td class="text-center">
                            <a href="{{ route('show', $item->id) }}" class="btn btn-outline-info btn-sm rounded-pill">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('edit', $item->id) }}" class="btn btn-outline-warning btn-sm rounded-pill">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-dark border-top">
            <div class="d-flex justify-content-end">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
@endsection