<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/personaldata.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Registro de Datos Personales</title>
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

<section class="container mt-5">
        <form action="" method="get" class="m-auto bg-white p-5 rounded-sm shadow-lg">
            @csrf
            <h2 class="text-center">DATOS GENERALES</h2>
            <h2 class="text-center">DATOS PERSONALES DEL ESTUDIANTE</h2>
            @if ($userDetails)
                <p><strong>Nombre:</strong> {{ $userDetails->student_name }}</p>
                <p><strong>Apellidos:</strong> {{ $userDetails->student_lastnames }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($userDetails->stuedent_brithday)->format('d/m/Y') }}</p>
                <p><strong>CURP:</strong> {{ $userDetails->student_curp }}</p>
                <p><strong>Género:</strong> {{ $userDetails->student_grender }}</p>
                <p><strong>Teléfono Móvil del Tutor:</strong> {{ $userDetails->student_cellphone }}</p>
                <p><strong>Nombre del Tutor:</strong> {{ $userDetails->student_tutor }}</p>
            @endif

            <h2 class="text-center mt-4">DATOS DE DOMICILIO DEL ESTUDIANTE</h2>
            @foreach ($addressData as $address)
                <p><strong>Código Postal:</strong> {{ $address->postal_code }}</p>
                <p><strong>Estado:</strong> {{ $address->state_name }}</p>
                <p><strong>Municipio:</strong> {{ $address->munipality_name }}</p>
                <p><strong>Calle y Colonia:</strong> {{ $address->colony_name }}</p>
                <p><strong>Número Exterior:</strong> {{ $address->outdor_number }}</p>
                <p><strong>Número Interior:</strong> {{ $address->internal_number }}</p>
                <p><strong>Referencias Geográficas:</strong> {{ $address->geographics_references }}</p>
            @endforeach

            <h2 class="text-center mt-4">DATOS MÉDICOS</h2>
            @if ($medicalData)
                <p><strong>Diagnóstico Médico:</strong> {{ $medicalData->medical_diagnostic }}</p>
                <p><strong>Tipo de Sangre:</strong> {{ $medicalData->blood_type }}</p>
                <p><strong>Nombre de la Alergia:</strong> {{ $medicalData->allergy_name }}</p>
                <p><strong>Consideraciones Médicas Adicionales:</strong> {{ $medicalData->aditional_consideration }}</p>
            @endif

            <div class="text-center mt-4">
                <a href="" class="btn btn-primary btn-lg">Finalizar</a>
            </div>
        </form>
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