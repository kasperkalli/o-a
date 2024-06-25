@php  
    if(Auth::check()){
        if (Auth::user()->rol_id == 2) {
            $route = 'layouts.master'; 
        }else{
            $route = 'layouts.usuarionormal';
        }
    }
@endphp

@extends($route)
@section('contenido-principal')
<style>
    /* Make the layout responsive and center-aligned on desktop */
    @media (min-width: 992px) {
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }
       .right {
           max-width: 500px; /* adjust the max-width to your liking */
           margin: 0 auto;
        }
    }
    </style>
    <div class="row vh-100 g-0">
        <!-- derecha inicio -->
        <div class="right col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Edita los datos de tu cuenta</h3>
                        <p class="text-secondary">Ingresa los nuevos datos</p>
                    </div>
                    
                    <!-- divisor inicio -->
                    <div class="position-relative">
                        <hr class="text-secondary">
                    </div>
                    <!-- divisor fin -->
                    
                    <!-- form inicio -->
                    <form action="{{route('usuarios.edit.store')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3 d-flex">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="text" id="name" name="name" class="form-control form-control-lg fs-6" value="{{ $user->name?? '' }}" required>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt'></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control form-control-lg fs-6" value="{{ $user->email?? '' }}" required>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <button class="btn btn-primary btn-lg w-100" type="submit">
                            guardar nuevos datos
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

@endsection