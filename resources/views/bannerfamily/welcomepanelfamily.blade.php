<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>PANEL DEL PADRE DE FAMILIA </title>

    <style>
    /* Estilos para la barra de navegación */

/* Estilos para el cuerpo */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Estilos para la barra de navegación */
#navbar {
    background-color: #2096ea;
    padding: 10px 0; /* Añadir espacio en la parte superior e inferior */
}

#navbar ul {
    padding-left: 0;
    list-style: none;
    text-align: center;
    margin: 0; /* Eliminar el margen */
}

#navbar .navbar-brand img {
    max-width: 100%;
    height: auto;
}

/* Estilos adicionales para hacer que la barra de navegación sea pegajosa en la parte superior */
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
}
.logo{
    width: 20%;
    height: 30%;
}
footer{
    max-width: 100%;
    height: auto;
    background-color: red;

}
.social-icons .social-icon {
    display: inline-block;
    margin-right: 10px;
    color: #333; /* Cambia el color de los iconos de redes sociales según lo necesites */
    font-size: 24px;
}

#menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

#menu > li > a {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
}

#submenu {
    display: none;
    list-style: none;
    padding: 0;
    margin: 0;
    position: absolute;
}

#submenu li {
    margin: 0;
}

#submenu a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    background-color: #6c757d;
    color: white;
}

#submenu a:hover {
    background-color: #5a6268;
}

#menuToggle:focus + #submenu,
#submenu:hover {
    display: block;
}

    </style>
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
                        <a href="/Kardexrequest" class="btn btn-primary  d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size: 18px;">
                            <img src="img/icons/kardex.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                           CONSULTAR CARTILLA DE PAGO
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/clarificationfamily" class="btn btn btn-danger d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size: 18px;">
                            <img src="img/icons/clarification.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                           ACLARACIONES Y QUEJAS
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/Kardexpdf" class="btn btn-success btn-lg d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size: 18px;">
                            <img src="img/icons/kardexpdf.png" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                             GENERAR PDF DE LA CARTILLA DE PAGO

                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="https://drive.google.com/file/d/1KDWFwn-zBOnJuplzc1i0yfPUiont4hms/view?usp=sharing" class="btn btn-warning d-flex align-items-center justify-content-center mb-3 font-weight-bold font-size: 18px;">
                            <img src="img/icons/userm.png" class="rounded" id="logo" alt="" style="width: 40%; height: 30%;">
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
@endauth

@guest
    <h1>POR FAVOR INICIA SESION PARA AUTENTIFICARSE <a href="/welcome">Iniciar Sesion</a></h1>

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
    @endguest




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script></body>
</html>