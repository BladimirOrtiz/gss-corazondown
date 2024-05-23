<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/clarification.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Lista de Quejas y Aclaraciones</title>
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
    <br>
    <br>

    <section>
    <div class="col-md-9 p-3 min-vh-100">
    <h1>Tabla de Aclaraciones y Quejas</h1>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th>Folio del Proceso</th>
                    <th>Categoría del Proceso</th>
                    <th>Descripción del Proceso </th>
                    <th>Fecha de Creación</th>
                    <th>Estado del Proceso</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($clarifications as $clarification)
                    <tr>
                        <td>{{ $clarification->clarification_folio }}</td>
                        <td>{{ $clarification->clarifications_category }}</td>
                        <td>{{ $clarification->description_clarification }}</td>
                        <td>{{ $clarification->clarification_date }}</td>
                        <td>{{ $clarification->clarification_state }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" id="successMessage">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
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