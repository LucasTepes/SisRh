@extends('layouts.default')

@section('title', 'SisRH - Funcionários')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ @route('funcionarios.create') }}</x-slot>
        <x-slot name="title">Cadastrar Funcionário</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Funcionários</h1>

    <p>Total de Funcionarios: {{ $totalFuncionarios }}</p>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif


    <x-busca>
        <x-slot name="rota">{{ route('funcionarios.index') }}</x-slot>
        <x-slot name="tipo">Funcionario</x-slot>
    </x-busca>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Departamento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $funcionario->id }}</th>
                    <td>
                        @if (empty($funcionario->foto))
                            <img src="/images/sombra_funcionario.jpg" alt="Foto" class="img-thumbnail" width="70px">
                        @else
                            <img src="{{ url("storage/funcionarios/$funcionario->foto") }}" alt="Foto" class="img-thumbnail" width="70px">
                        @endif
                    </td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->cargo->descricao }}</td>
                    <td>{{ $funcionario->departamento->nome }}</td>
                    <td>
                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $funcionario->id }}"><i class="bi bi-trash"></i></a>
                        <a href="{{ route('funcionarios.show', $funcionario->id) }}" title="Editar" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                        {{-- Inserir o componente modal na view --}}
                        <x-modal-delete>
                            <x-slot name="id">{{ $funcionario->id }}</x-slot>
                            <x-slot name="tipo">funcionario</x-slot>
                            <x-slot name="nome">{{ $funcionario->nome }}</x-slot>
                            <x-slot name="rota">funcionarios.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $funcionarios->links() }}

@endsection
