@extends('layouts.master')

@section('contenido-principal')
    <div class="">
        <h1>Usuarios</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('usuario.delete', $user->id) }}" method="POST" style="display: inline; @if ($user->name == Auth::User()->name) pointer-events: none @endif">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection