@extends('layouts.usuarionormal')

@section('contenido-principal')

@php
$platos_escogidos = [];
function addelement($array, $element){
    $array[] = $element;
    return $array;
}
@endphp
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
                                <td class="align-middle">{{ $plato->categoria }}</td>
                                <td class="text-center" style="width: 1rem">

                                </td>
                                <td class="text-center" style="width: 1rem">
                                    <a href="#" class="btn btn-sm btn-info pb-0 text-white" data-bs-toggle="tooltip" onclick={{$platos_escogidos = addelement($platos_escogidos, $plato) }}
                                        data-bs-title="Ver {{ $plato->nombre }}">
                                        <span class="material-icons">agregar a pedido</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- lista de platos escogidos -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Platos escogidos</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($platos_escogidos as $plato)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $plato->nombre }}
                                    <span class="badge badge-primary badge-pill">{{ $plato->precio }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>  
                </div>
            </div>
    </div>
@endsection
