@extends('layouts.default')

@section('title', 'SisRH - Cadastro de Cargos')

@section('content')
    <h1 class="fs-2 mb-5">Cadastro de Cargos</h1>

    <form class="row g-3" method="POST" action="{{ route('cargos.store') }}" enctype="multipart/form-data">
        {{-- Criar hash de segurança para submissão do formulário --}}
        @csrf
        @include('cargos.partials.form')
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('cargos.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
