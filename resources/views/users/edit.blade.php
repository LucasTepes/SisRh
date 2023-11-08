@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Usuários')

@section('content')
    <h1 class="fs-2 mb-5">Alterar Usuários</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <form class="row g-3" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf

        @method('PUT')

        @include('users.partials.form')

        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
