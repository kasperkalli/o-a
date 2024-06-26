@extends('layouts.usuarionormal')

@section('contenido-principal')
    <h2>Ver mesas</h2>
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
                            <th>Estado</th>
                            <th>Capacidad</th>
                            <th colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mesas as $num => $mesa)
                            <tr>
                                <td class="align-middle">{{ $mesa->id }}</td>
                                <td class="align-middle">{{ $mesa->usandose }}</td>
                                <td class="align-middle">{{ $mesa->capacidad }}</td>
                                <td class="text-center" style="width: 1rem"></td>

                                <td class="text-center" style="width: 1rem">
                                    <a href="#" class="btn btn-sm btn-warning pb-0 text-white"
                                        data-bs-toggle="tooltip" data-bs-title="Editar {{ $mesa->id }}">

                                        <span class="material-icons">edit</span>
                                    </a>
                                </td>
                                <td class="text-center" style="width: 1rem">
                                    <form action="{{ route('platos.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $mesa->id }}">
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
                    <div class="card-header bg-dark text-white">Agregar mesa</div>
                    <div class="card-body">

                        <form method="POST" action="{{ route('mesas.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="capacidad" class="form-label">Capacidad de la mesa</label>
                                <input type="text" name="capacidad" id="capacidad" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control">
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