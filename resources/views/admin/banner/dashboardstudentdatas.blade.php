<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/studentdatas.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>DATOS DEL ESTUDIANTE</title>

    <style>
      /* Estilos generales para todos los dispositivos */
body {
    font-family: Arial, sans-serif;
}

/* Estilos específicos para dispositivos de escritorio */
@media (min-width: 1920px) {
    /* Aquí puedes añadir estilos específicos para pantallas más grandes */
    body {
        font-size: 16px;
    }
}

/* Estilos específicos para smartphones */
@media (max-width: 1920px) {
    /* Aquí puedes añadir estilos específicos para pantallas más pequeñas */
    body {
        font-size: 14px;
    }
}
* Estilos para la barra de navegación */
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
     /* Estilos para el formulario */
     form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="date"],
    form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }


    form input[type="submit"] {
        width: 100%;
        background-color: #2096ea;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    small.txt-danger {
        color: red;
    }
    .table-container {
        margin-top: 20px;
        overflow-x: auto;
    }
    
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 18px;
        text-align: left;
        border: 1px solid #ddd;
    }
    
    .styled-table th, .styled-table td {
        padding: 12px 15px;
    }
    
    .styled-table th {
        background-color: #009879;
        color: #ffffff;
        text-align: center;
    }
    
    .styled-table tr:nth-child(even) {
        background-color: #f3f3f3;
    }
    
    .styled-table tr:hover {
        background-color: #f1f1f1;
    }
    
    .styled-table td {
        text-align: center;
    }
    
    /* Responsive styles */
    @media (max-width: 600px) {
        .styled-table thead {
            display: none;
        }
        .styled-table, .styled-table tbody, .styled-table tr, .styled-table td {
            display: block;
            width: 100%;
        }
        .styled-table tr {
            margin-bottom: 15px;
        }
        .styled-table td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }
        .styled-table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: bold;
            text-align: left;
        }
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
    
    .table-container {
        position: relative;
        padding-bottom: 50px; /* Ajusta el valor según sea necesario */
    }
    
    .button-container {
        position: absolute;
        bottom: 10px; /* Ajusta el valor según sea necesario */
        left: 10px; /* Ajusta el valor según sea necesario */
    }
      
    </style>
</head>

<body>
    @auth
    <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #292137">
        <!-- BARRA DE NAVEGACION -->
        <ul id="mn" class="nav nav-pills">
            <div style="display: flex; justify-content: space-between; align-items: center; width: 90%;">
                <a class="navbar-brand" href="{{ url('index.html') }}">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                </a>

                <a class="navbar-brand" href="{{ url('index.html') }}">
                    <img src="{{ asset('img/gss.png') }}" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
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

    <div class="container">
        <a href="/adminepanel" class="btn btn-light" title="Panel del Administrador">
            <img src="{{ asset('img/icons/home.png') }}" alt="Imagen" width="50" height="50">
        </a>
        <a href="/studentdatas" class="btn btn-light" title="Listado de Padres">
            <img src="{{ asset('img/icons/hlist.png') }}" alt="Imagen" width="50" height="50">
        </a>

    </div>

    <br>

    <section>
        <div class="table-container">
            <h2>Datos Personales</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nombre(s)</th>
                        <th>Apellidos</th>
                        <th>Fecha de Nacimiento</th>
                        <th>CURP</th>
                        <th>Genero</th>
                        <th>Número Teléfonico del Tutor</th>
                        <th>Nombre del Tutor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->studentPersonalDatas->student_name }}</td>
                        <td>{{ $user->studentPersonalDatas->student_lastnames }}</td>
                        <td>{{ $user->studentPersonalDatas->student_birthday }}</td>
                        <td>{{ $user->studentPersonalDatas->student_curp }}</td>
                        <td>{{ $user->studentPersonalDatas->student_gender }}</td>
                        <td>{{ $user->studentPersonalDatas->student_cellphone }}</td>
                        <td>{{ $user->studentPersonalDatas->student_tutor }}</td>
                    </tr>
                </tbody>
            </table>
            
        </div>

        <div class="table-container">
            <h2>Datos de Dirección</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Código Postal</th>
                        <th>Estado</th>
                        <th>Municipio</th>
                        <th>Colonia</th>
                        <th>Calle</th>
                        <th>Número Exterior</th>
                        <th>Número Interior</th>
                        <th>Referencias Geográficas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->addressData as $address)
                    <tr>
                        <td>{{ $address->postal_code }}</td>
                        <td>{{ $address->state_name }}</td>
                        <td>{{ $address->municipality_name }}</td>
                        <td>{{ $address->colony_name }}</td>
                        <td>{{ $address->street_name }}</td>
                        <td>{{ $address->outdoor_number }}</td>
                        <td>{{ $address->internal_number }}</td>
                        <td>{{ $address->geographics_references }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         
        </div>

        <div class="table-container">
            <h2>Datos Médicos</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Diagnóstico Médico</th>
                        <th>Tipo de Sangre</th>
                        <th>Nombre de Alergia</th>
                        <th>Consideraciones Adicionales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->medicalData->medical_diagnostic }}</td>
                        <td>{{ $user->medicalData->blood_type }}</td>
                        <td>{{ $user->medicalData->allergy_name }}</td>
                        <td>{{ $user->medicalData->additional_consideration }}</td>
                    </tr>
                </tbody>
            </table>
         
        </div>

        <div style="text-align: center;">
            <button class="btn btn-primary" type="button" onclick="location.href='/editstudent/{{ $user->id_user }}'">ACTUALIZAR DATOS</button>
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
        <br>

    </section>

    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                </div>
                <div class="col-md-6 text-center">
                    <div class="social-icons mb-3">
                        <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                            <img src="{{ asset('img/icons/ficon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="{{ asset('img/icons/xicon.png') }}" class="rounded" id="logo" alt="" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="{{ asset('img/icons/insicon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="{{ asset('img/icons/ticon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
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
    <h1>POR FAVOR INICIA SESIÓN PARA AUTENTIFICARSE <a href="/sesion">Iniciar Sesión</a></h1>

    <br>
    <br>
    <footer>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center mb-3">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="" style="width: 40%; height: 70%;">
                </div>
                <div class="col-md-6 text-center">
                    <div class="social-icons mb-3">
                        <a href="https://www.facebook.com/FundacionCorazonDown" class="social-icon">
                            <img src="{{ asset('img/icons/ficon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="{{ asset('img/icons/xicon.png') }}" class="rounded" id="logo" alt="" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="{{ asset('img/icons/insicon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="{{ asset('img/icons/ticon.png') }}" class="rounded" id="logo" alt="" style="width: 70%; height: 70%;">
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

    <script src="path/to/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
