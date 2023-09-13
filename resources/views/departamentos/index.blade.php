@extends('layouts.default')

@section('title', 'SisRH - Departamentos')

@section('content')

    <x-btn-create>
        <x-slot name="route">{{ @route('departamentos.create') }}</x-slot>
        <x-slot name="title">Cadastrar Departamentos</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Departamentos</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Departamento</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $departamento->id }}</th>
                    <td>{{ $departamento->nome }}</td>
                    <td>
                        <a href="{{ route('departamentos.edit', $departamento->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $departamento->id }}"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
