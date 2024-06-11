<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicio de sesión</title>
</head>

<body>
    <div class="row vh-100 g-0">
        <!--Izquierda inicio-->
        <div class="col-lg-6 position-relative d-none d-lg-block">
            <div class="bg-holder" style="background-image: url(images/Logo.png)"></div>
        </div>
        <!--Izquierda fin-->

        <!--derecha inicio-->
        <div class="right col-lg-6">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">

                    <!--icono inicio-->
                    <a href="https://aula.usm.cl" class="d-flex justify-content-center mb-4">
                        <img src="/images/restotech.jpg" alt="" width="250">
                    </a>
                    <!--icono fin-->

                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Inicio de sesión</h3>
                        <p class="text-secondary">Ingresa a tu cuenta</p>
                    </div>

                    <!--divisor inicio-->
                    <div class="position-relative">
                        <hr class="text-secondary">
                    </div>
                    <!--divisor fin-->

                    <!--form inicio-->
                    <form action="#">
                        <div class="input-group mb-3 d-flex">
                            <span class="input-group-text">
                                <i class='bx bx-user'></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" placeholder="Usuario">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bx-lock-alt'></i>
                            </span>
                            <input type="password" class="form-control form-control-lg fs-6" placeholder="Contraseña">
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="form-check">
                                <label for="form-check"
                                    class="form-check-label text-secondary"><small>Recuerdame</small></label>
                            </div>
                            <div>
                                <small><a href="#">Olvidé mi contraseña</a></small>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-lg w-100" href="/home" role="button">Iniciar
                            Sesión</a>
                    </form>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
