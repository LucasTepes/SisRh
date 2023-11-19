@extends('layouts.default')

@section('title', 'SisRH - Usuários')

@section('content')

    <x-btn-create>
        <x-slot name="route">{{ @route('users.create') }}</x-slot>
        <x-slot name="title">Cadastrar Usuários</x-slot>
    </x-btn-create>

    <h1 class="fs-2 mb-3">Lista de Usuários</h1>

    <x-busca>
        <x-slot name="rota">{{ route('users.index') }}</x-slot>
        <x-slot name="tipo">Usuario</x-slot>
    </x-busca>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col" width="110px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="text-center align-middle">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" title="Editar" class="btn btn-primary"><i class="bi bi-pen"></i></a>
                        <a href="#" title="Deletar" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}"><i class="bi bi-trash"></i></a>
                        {{-- Inserir o componente modal na view --}}
                        <x-modal-delete>
                            <x-slot name="id">{{ $user->id }}</x-slot>
                            <x-slot name="tipo">user</x-slot>
                            <x-slot name="nome">{{ $user->name }}</x-slot>
                            <x-slot name="rota">users.destroy</x-slot>
                        </x-modal-delete>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
