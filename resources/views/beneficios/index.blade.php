@extends('layouts.default')

@section('title', 'SisRH - Beneficios')

@section('content')
    <x-btn-create>
        <x-slot name="route">{{ @route('beneficio.create') }}</x-slot>
        <x-slot name="title">Cadastrar Beneficio</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Beneficios</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-success text-center">{{ Session::get('error') }}</div>
    @endif

    <x-busca>
        <x-slot name="rota">{{ route('beneficio.index') }}</x-slot>
        <x-slot name="tipo">Beneficio</x-slot>
    </x-busca>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficios as $beneficio)
                <tr class="text-center align-center">
                    <th scope="row">{{ $beneficio->id }}</th>
                    <td>{{ $beneficio->descricao }}</td>
                    <td>{{ $beneficio->status }}</td>
                    <td>
                        <a href="{{ route('beneficio.edit', $beneficio->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $beneficio->id }}"><i class="bi bi-trash"></i></a>
                        {{-- Inserir o componente modal na view --}}
                        <x-modal-delete>
                            <x-slot name="id">{{ $beneficio->id }}</x-slot>
                            <x-slot name="tipo">beneficio</x-slot>
                            <x-slot name="nome">{{ $beneficio->descricao }}</x-slot>
                            <x-slot name="rota">beneficio.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $beneficios->links() }}
@endsection
