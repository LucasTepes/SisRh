@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Funcionários')

@section('content')
    <h1 class="fs-2 mb-5">Alterar Funcionário</h1>

    <form class="row g-3" method="POST" action="{{ route('funcionarios.update', $funcionario->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('PUT')

        @include('funcionarios.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{ route('funcionarios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
