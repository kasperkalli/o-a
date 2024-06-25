@extends('layouts/master')

@section('contenido-principal')
    <!-- datos -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3 class="text-center m-3">Menú</h3>
            </div>
        </div>

        <div class="row">
            <!-- tabla -->
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($platos as $num => $plato)
                            <tr>
                                <td class="align-middle">{{ $num + 1 }}</td>
                                <td class="align-middle">{{ $plato->nombre }}</td>
                                <td class="align-middle">{{ $plato->precio }}</td>
                                <td class="align-middle">{{ $plato->categoria_id }}</td>
                                <td class="text-center" style="width: 1rem"></td>

                                <td class="text-center" style="width: 1rem">
                                    <a href="#" class="btn btn-sm btn-warning pb-0 text-white" 
                                        data-bs-toggle="tooltip" data-bs-title="Editar {{ $plato->nombre }}">
                                         <!-- onclick="route('platos.show', $plato->id)}}" -->
                                        <span class="material-icons">edit</span>
                                    </a>
                                </td>
                                <td class="text-center" style="width: 1rem">
                                    <form action="{{route('platos.delete')}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $plato->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger pb-0 text-white">
                                            <span class="material-icons">delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- form agregar plato -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Agregar plato al menú</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('platos.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del plato</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio del plato</label>
                                <input type="text" name="precio" id="precio" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <input type="text" name="categoria" id="categoria" class="form-control">
                            </div>
                            <div class="mb-3 d-grid gap-2 d-lg-block">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agregar Plato</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
