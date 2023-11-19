@extends('layouts.default')

@section('title', 'SisRh - Show Funcionario')

@section('content')
<div class="col-12 pb-3">
            <a href="{{ route('funcionarios.index') }}" class="btn btn-warning">Voltar</a>
        </div>
    <h1 class="pb-3">{{ $funcionario->nome }}</h1>
    <form class="row g-3">
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="name" class="form-control" id="nome" name="nome" value="{{ $funcionario->nome ?? '' }}">
        </div>
        <div class="col-md-6">
            <label for="data_nasc" class="form-label">Data de Nascimento</label>
            <p class="form-control">{{ $funcionario->data_nasc }}</p>
        </div>
        <div class="col-md-4">
            <label for="sexo" class="form-label">Sexo</label>
            @if ($funcionario->sexo == 'f')
                <p class="form-control">Feminino</p>
            @elseif ($funcionario->sexo == 'm')
                <p class="form-control">Masculino</p>
            @elseif ($funcionario->sexo == 'o')
                <p class="form-control">Gay</p>
            @endif
        </div>
        <div class="col-md-4">
            <label for="cpf" class="form-label">CPF</label>
            <p class="form-control">{{ $funcionario->cpf }}</p>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">E-mail</label>
            <p class="form-control">{{ $funcionario->email }}</p>
        </div>
        <div class="col-md-4">
            <label for="telefone" class="form-label">Telefone</label>
            <p class="form-control">{{ $funcionario->telefone }}</p>
        </div>
        <div class="col-md-4">
            <label for="departamento_id" class="form-label">Departamento</label>
            <p class="form-control">{{ $departamento->nome }}</p>
        </div>
        <div class="col-md-4">
            <label for="cargo_id" class="form-label">Cargo</label>
            <p class="form-control">{{ $cargo->nome }}</p>
        </div>
        <div class="col-md-4">
            <label for="salario" class="form-label">Salário</label>
            <p class="form-control">{{ $funcionario->salario }}</p>
        </div>
        <div class="col-md-4">
            <label for="data_contratacao" class="form-label">Data de Contratação</label>
            <p class="form-control">{{ $funcionario->data_contratacao }}</p>
        </div>
        <div class="col-md-4">
            <label for="data_desligamento" class="form-label">Data de Desligamento</label>
            <p class="form-control">{{ $funcionario->data_desligamento }}</p>
        </div>
        <div class="col-md-6">
            <label for="foto" class="form-label">Foto</label>
            <div>
                @if (empty($funcionario->foto))
                    <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70px">
                @else
                    <img src="{{ url("storage/funcionarios/$funcionario->foto") }}" alt="Foto" class="img-thumbnail"
                        width="70px">
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <label for="beneficios">Beneficios</label>
            <div>
                <ul>
                    @foreach ($lista_beneficios as $beneficio)
                        <li>{{ $beneficio->descricao }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <label for="status" class="form-label">Status</label>
            <p class="form-control">{{ $funcionario->status }}</p>
        </div>
    </form>

@endsection
