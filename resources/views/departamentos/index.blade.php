@extends('layouts.default')

@section('title', 'SisRH - Departamentos')

@section('content')


    <x-btn-create>
        <x-slot name="route">{{ @route('departamentos.create') }}</x-slot>
        <x-slot name="title">Cadastrar Departamentos</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Departamentos</h1>

    <p>Total de departamentos: {{ $totalDepartamentos }}</p>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <x-busca>
        <x-slot name="rota">{{ route('departamentos.index') }}</x-slot>
        <x-slot name="tipo">Departamentos</x-slot>
    </x-busca>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Departamento</th>
                <th scope="col">Funcionarios</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $departamento->id }}</th>
                    <td>{{ $departamento->nome }}</td>
                    <td>{{ $departamento->funcionariosAtivos->count(); }}</td>
                    <td>
                        <a href="{{ route('departamentos.edit', $departamento->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $departamento->id }}"><i class="bi bi-trash"></i></a>
                        <x-modal-delete>
                            <x-slot name="id">{{ $departamento->id }}</x-slot>
                            <x-slot name="tipo">Departamento</x-slot>
                            <x-slot name="nome">{{ $departamento->nome }}</x-slot>
                            <x-slot name="rota">departamentos.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $departamentos->links() }}
@endsection
