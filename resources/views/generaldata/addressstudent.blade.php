<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Registro de Datos de Domicilio </title>
</head>

<body>

    <head>
        <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #292137">
            <!-- BARRA DE NAVEGACION -->
            <ul id="mn" class="nav nav-pills">
                <div style="display: flex; justify-content: space-between; align-items: center; width: 90%;">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/logo fcd.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                    </a>

                    <a class="navbar-brand" href="index.html">
                        <img src="img/gss.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                    </a>

                    <h2 style="color: white; font-style: italic;">SISTEMA DE GESTIÓN Y SERVICIOS FUNDACIÓN CORAZÓN DOWN</h2>
                </div>
            </ul>
               </nav>
    </head>
    <br>
    <br>
    <ul id="menu">
    <li>
        @if(auth()->check())
            <a href="#">{{ auth()->user()->name ?? auth()->user()->username }}</a>
            <ul>
                <li><a href="/logout">Cerrar Sesión</a></li>
            </ul>
        @else
            <a href="/login">Iniciar Sesión</a>
        @endif
    </li>
</ul>

    <section>
    <div class="container d-flex">
    <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
        @csrf
        <h2 class="text-center">REGISTRO DE DATOS DOMICILIO DEL ESTUDIANTE</h2>

        <label for="postal_code">Código Postal:</label>
        <input type="text" id="postal_code" name="postal_code" placeholder="Código Postal" value="{{ old('postal_code') }}" required>
        @error('postal_code')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="state_nome">Estado:</label>
        <input type="text" id="state_nome" name="state_nome" placeholder="Estado" value="{{ old('state_nome') }}" required>
        @error('state_nome')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="munipality_name">Municipio:</label>
        <input type="text" id="munipality_name" name="munipality_name" placeholder="Municipio" value="{{ old('munipality_name') }}" required>
        @error('munipality_name')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="colony_name">Colonia:</label>
        <input type="text" id="colony_name" name="colony_name" placeholder="Colonia" value="{{ old('colony_name') }}" required>
        @error('colony_name')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="outdor_number">Número Exterior:</label>
        <input type="text" id="outdor_number" name="outdor_number" placeholder="Número Exterior" value="{{ old('outdor_number') }}" required>
        @error('outdor_number')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="internal_mnumber">Número Interior:</label>
        <input type="text" id="internal_mnumber" name="internal_mnumber" placeholder="Número Interior (opcional)" value="{{ old('internal_mnumber') }}">
        @error('internal_mnumber')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror

        <label for="geographics_references">Referencias Geográficas:</label>
        <input type="text" id="geographics_references" name="geographics_references" placeholder="Referencias Geográficas" value="{{ old('geographics_references') }}" required>
        @error('geographics_references')
        <small class="txt-danger mt-1">
            <strong>{{ $message }}</strong>
        </small>
        @enderror


        <div class="text-center">
            <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
    </form>

    <script>
        function capitalizeInput(input) {
            const value = input.value;
            input.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
    </script>
</div>


    </section>



    <br>
    <br>
    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3">
                    <img src="img/logo fcd.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                </div>
                <div class="col-md-6 text-center">
                    <div class="social-icons mb-3">
                        <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                            <img src="img/icons/ficon.png" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="img/icons/xicon.png" class="rounded" id="logo" alt="" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="img/icons/insicon.png" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="img/icons/ticon.png" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                    </div>
                    <div class="location text-right">
                        <p style="color: white; font-style: italic; font-size: 14px; font-weight: bold;">
                            XICOTÉNCATL 1017, ZONA FEB 10 2015, BARRIO DE LA NORIA, 68100 OAXACA DE JUÁREZ, OAX.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</body>

</html>