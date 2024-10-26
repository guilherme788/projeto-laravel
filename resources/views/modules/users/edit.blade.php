@extends('layouts.main')

<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-lg rounded-5">
            <div class="card-header text-center bg-white border-0 rounded-top-5 py-4">
                <h3 class="text-dark fw-bold">Editar Usuário</h3>
                <p class="text-muted mb-0">Altere as informações abaixo</p>
            </div>
            <div class="card-body p-5">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sucesso!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-4">
                        <input type="text" name="name" id="name" class="form-control rounded-4" placeholder="Nome" required value="{{ $item->name }}">
                        <label for="name">Altere o Nome</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" name="password" id="password" class="form-control rounded-4" placeholder="Senha" required value="{{ $item->password }}">
                        <label for="password">Altere a Senha</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg rounded-4 py-3 mb-3 shadow-sm">
                            <i class="bi bi-pencil-square me-2"></i>Atualizar
                        </button>
                        <a href="{{ route('index') }}" class="btn btn-outline-secondary btn-lg rounded-4 py-3 shadow-sm">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
