<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>SISTEMA DE GESTION Y SERVICIOS FUNDACIÓN CORAZÓN DOWN</title>

    <style>
        /* Estilos para el cuerpo */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos para la barra de navegación */
        #navbar {
            background-color: #292137;
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

        .logo {
            width: 20%;
            height: 30%;
        }

        footer {
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

        .btn-custom {
            font-weight: bold;
            font-size: 18px;
        }

        .btn-custom img {
            width: 40%;
            height: 70%;
            margin-right: 10px;
        }

        .location p {
            color: white;
            font-style: italic;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<nav id="navbar" class="navbar navbar-light sticky-top">
    <!-- BARRA DE NAVEGACION -->
    <ul id="mn" class="nav nav-pills">
        <div style="display: flex; justify-content: space-between; align-items: center; width: 90%;">
            <a class="navbar-brand" href="welcome">
                <img src="img/logo fcd.png" class="rounded logo" alt=""style="width: 40%; height: 70%;">
            </a>
            <a class="navbar-brand" href="welcome">
                <img src="img/gss.png" class="rounded logo" alt="" style="width: 40%; height: 70%;">
            </a>
            <h2 style="color: white; font-style: italic;">SISTEMA DE GESTIÓN Y SERVICIOS FUNDACIÓN CORAZÓN DOWN</h2>
        </div>
    </ul>
</nav>
<br>
<br>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/sesion" class="btn btn-danger d-flex align-items-center justify-content-center mb-3 btn-custom">
                            <img src="img/icons/familyuser.png" class="rounded" alt="">
                            PADRES DE FAMILIA
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/sesionadmin" class="btn btn-dark d-flex align-items-center justify-content-center mb-3 btn-custom">
                            <img src="img/icons/administrator.png" class="rounded" alt="">
                            ADMINISTRADOR
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-success d-flex align-items-center justify-content-center mb-3 btn-custom">
                            <img src="img/icons/mu.png" class="rounded" alt="">
                            MANUALES DEL SISTEMA
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <a href="/aboutsystem" class="btn btn-primary d-flex align-items-center justify-content-center mb-3 btn-custom">
                            <img src="img/icons/help.png" class="rounded" alt="">
                            AYUDA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <div class="location">
                    <p>XICOTÉNCATL 1017, ZONA FEB 10 2015, BARRIO DE LA NORIA, 68100 OAXACA DE JUÁREZ, OAX.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
