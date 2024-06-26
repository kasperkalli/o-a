@extends('layouts.usuarionormal')

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
                <form action="{{route('platos.add.escogidos')}}" method="GET">
                    @csrf
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Categoría</th>
                                <th colspan="3">Seleccion</th>
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
                                    <input type="checkbox" name="platos_escogidos[]" value="{{ $plato->id }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <button class="btn btn-primary" type="submit">Agregar pedido</button>
                    </div>
                </form>
            </div>
            <!-- lista de platos escogidos -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Platos escogidos</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @if($platos_escogidos->count() > 0)
                                <form method="POST" action="{{route('platos.escogidos.store')}}">
                                    @csrf
                                    @foreach($platos_escogidos as $plato)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $plato->nombre }}
                                            <input type="hidden" name="platos_escogidos[]" value="{{ $plato->id }}">
                                        </li>
                                    @endforeach
                                    <button class="btn btn-primary">Confirmar Compra</button>
                                </form>
                            @endif
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
