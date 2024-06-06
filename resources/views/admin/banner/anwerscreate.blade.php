<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR RESPUESTA</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/payregister.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #292137">
        <!-- BARRA DE NAVEGACION -->
        <ul id="mn" class="nav nav-pills">
            <div style="display: flex; justify-content: space-between; align-items: center; width: 90%;">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="Logo FCD" style="width: 40%; height: 70%;">
                </a>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('img/gss.png') }}" class="rounded" id="logo" alt="GSS" style="width: 40%; height: 70%;">
                </a>
                <h2 style="color: white; font-style: italic;">SISTEMA DE GESTIÓN Y SERVICIOS FUNDACIÓN CORAZÓN DOWN</h2>
            </div>
        </ul>
    </nav>

    <br><br>

    <ul id="menu">
        <li>
            <a id="menuToggle" href="#">{{ auth()->user()->name ?? auth()->user()->username }}</a>
            <ul id="submenu">
                @if(auth()->check())
                <li><a href="/logout">Cerrar Sesión</a></li>
                @else
                <li><a href="/login">Iniciar Sesión</a></li>
                @endif
            </ul>
        </li>
    </ul>

    <br>
    <div class="container">
        <a href="{{ route('payregister.show', $user->id_user) }}" class="btn btn-light" title="Listado de Pagos">
            <img src="{{ asset('img/icons/list.png') }}" alt="Imagen" width="50" height="50">
        </a>
    </div>
    <br>

    <br>

    <div class="container">
        <h1 style="text-align: center;">Crear Respuesta para {{ $user->username }} con Folio {{ $clarification->clarification_folio }}</h1>

        <form action="{{ route('answers.store', ['id_user' => $user->id_user, 'id_clarification' => $clarification->id_clarification]) }}" method="POST">
            @csrf
            <div class="form-group"> <!-- Process Folio -->
                <label for="exampleInputName" class="control-label">Folio de la Respuesta</label>
                <input type="text" class="form-control" name="folio_solution" id="folio_solution" value="{{ $folio }}" readonly>
                @error('folio_solution')
                <small class="txt-danger mt-1">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="clarification_header">Encabezado de Aclaración o Queja</label>
                <input type="text" class="form-control" id="clarification_header" name="clarification_header" required>
            </div>
            <div class="form-group">
                <label for="answers_description">Descripción de la Respuesta</label>
                <textarea class="form-control" id="answers_description" name="answers_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="answers_observation">Observaciones</label>
                <textarea class="form-control" id="answers_observation" name="answers_observation"></textarea>
            </div>
            <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
                </div>        </form>
    </div>
    <br><br>

    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="Logo FCD" style="width: 40%; height: 70%;">
                </div>
                <div class="col-md-6 text-center">
                    <div class="social-icons mb-3">
                        <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                            <img src="{{ asset('img/icons/ficon.png') }}" class="rounded" alt="Facebook" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="{{ asset('img/icons/xicon.png') }}" class="rounded" alt="X" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="{{ asset('img/icons/insicon.png') }}" class="rounded" alt="Instagram" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="{{ asset('img/icons/ticon.png') }}" class="rounded" alt="TikTok" style="width: 70%; height: 70%;">
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

</html>