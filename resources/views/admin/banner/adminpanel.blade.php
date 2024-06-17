<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>PANEL DEL ADMINISTRADOR</title>
</head>
<body>
@auth
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
<br>
<br>

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
<br>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/studentlist" class="btn btn-dark d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size-18px">
                            <img src="img/icons/rp.png" class="rounded" alt="" style="width: 40%; height: 50%;">
                            REGISTRAR PAGO
                        </a>
                    </div>
                </div>
             
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/studentdatas" class="btn btn-primary d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size-18px">
                            <img src="img/icons/du.png" class="rounded" alt="" style="width: 40%; height: 70%;">
                            DATOS DE LOS ESTUDIANTES
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/dataclarification" class="btn btn-success d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size-18px">
                            <img src="img/icons/clarification.png" class="rounded" alt="" style="width: 40%; height: 70%;">
                            SECCIÓN DE ACLARACIONES Y QUEJAS
                        </a>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/accountuser" class="btn btn-danger d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size-18px">
                            <img src="img/icons/ru.png" class="rounded" alt="" style="width: 40%; height: 30%;">
                            GESTIONAR CUENTAS DEL SISTEMA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var menuToggle = document.getElementById('menuToggle');
            var submenu = document.getElementById('submenu');

            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                submenu.style.display = (submenu.style.display === 'block') ? 'none' : 'block';
            });

            // Close submenu if clicking outside of it
            document.addEventListener('click', function(event) {
                if (!menuToggle.contains(event.target) && !submenu.contains(event.target)) {
                    submenu.style.display = 'none';
                }
            });
        });
    </script>
</section>

<footer>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center mb-3">
                <img src="img/logo fcd.png" class="rounded" alt="" style="width: 40%; height: 70%;">
            </div>
            <div class="col-md-6 text-center">
                <div class="social-icons mb-3">
                    <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                        <img src="img/icons/ficon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
                    </a>
                    <a href="https://x.com/mariopmtz" class="social-icon">
                        <img src="img/icons/xicon.png" class="rounded" alt="" style="width: 60%; height: 70%;">
                    </a>
                    <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                        <img src="img/icons/insicon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
                    </a>
                    <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                        <img src="img/icons/ticon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
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
@endauth

@guest
    <h1>POR FAVOR INICIA SESIÓN PARA AUTENTICARSE <a href="/sesion">Iniciar Sesión</a></h1>
    <br>
    <br>
    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3">
                    <img src="img/logo fcd.png" class="rounded" alt="" style="width: 40%; height: 70%;">
                </div>
                <div class="col-md-6 text-center">
                    <div class="social-icons mb-3">
                        <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                            <img src="img/icons/ficon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="img/icons/xicon.png" class="rounded" alt="" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="img/icons/insicon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="img/icons/ticon.png" class="rounded" alt="" style="width: 70%; height: 70%;">
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
@endguest

</body>
</html>
