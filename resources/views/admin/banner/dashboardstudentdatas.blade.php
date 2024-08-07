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
