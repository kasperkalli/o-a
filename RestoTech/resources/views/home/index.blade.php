@extends('layouts.usuarionormal')

@section('contenido-principal')
    <!-- contenido principal -->
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="text-center" style="padding: 5rem">
                <h4>Sistema de administración de locales de comida</h4>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <!-- equipos -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="">
                    <div class="card-body">
                        <h5 class="card-title">Mesas</h5>
                        <div class="btn-group d-flex">
                            <button class="btn btn-outline-success">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- estadios -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="">
                    <div class="card-body">
                        <h5 class="card-title">Menú</h5>
                        <div class="btn-group d-flex">
                            <button class="btn btn-outline-success">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- estadisticas -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="">
                    <div class="card-body">
                        <h5 class="card-title">Cuentas</h5>
                        <div class="btn-group d-flex">
                            <button class="btn btn-outline-success">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- jugadores -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card">
                    <img class="card-img-top" src="">
                    <div class="card-body">
                        <h5 class="card-title">Reclamos</h5>
                        <div class="btn-group d-flex">
                            <button class="btn btn-outline-success">Ver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
