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
                                <td class="align-middle">{{ $mesa->usandose == 0 ? 'Libre' : ' Ocupada' }}</td>
                                <td class="align-middle">{{ $mesa->numero_asientos }}</td>

                                <td class="text-center" style="width: 1rem">
                                    <form action="{{route('mesas.update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$mesa->id}}">
                                        <input type="hidden" name="estado" value="1">
                                        <button class="btn btn-sm btn-warning pb-0 text-white @if ($mesa->usandose > 0) disabled @endif"
                                            type="submit">
                                            <span class="material-icons">table_bar</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        
        </div>
    </div>
@endsection
