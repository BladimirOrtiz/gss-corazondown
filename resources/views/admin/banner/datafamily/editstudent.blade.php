<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/studentdatas.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>EDITAR DATOS DEL ESTUDIANTE</title>
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
        <h1 style="text-align: center;">Editar Datos del Estudiante</h1>

        <form action="{{ route('student.updatePersonalData', $user->id_user) }}" method="POST">
            @csrf
            <h2 style="text-align: center;">Datos Personales</h2>
            <div class="form-group">
                <label for="student_name">Nombre(s)</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="{{ $user->studentPersonalDatas->student_name }}">
            </div>
            <div class="form-group">
                <label for="student_lastnames">Apellidos</label>
                <input type="text" class="form-control" id="student_lastnames" name="student_lastnames" value="{{ $user->studentPersonalDatas->student_lastnames }}">
            </div>
            <div class="form-group">
                <label for="student_birthday">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="student_birthday" name="student_birthday" value="{{ $user->studentPersonalDatas->student_birthday }}">
            </div>
            <div class="form-group">
                <label for="student_curp">CURP</label>
                <input type="text" class="form-control" id="student_curp" name="student_curp" value="{{ $user->studentPersonalDatas->student_curp }}">
            </div>
            <div class="form-group">
                <label for="student_gender">Género</label>
                <input type="text" class="form-control" id="student_gender" name="student_gender" value="{{ $user->studentPersonalDatas->student_gender }}">
            </div>
            <div class="form-group">
                <label for="student_cellphone">Número Teléfonico del Tutor</label>
                <input type="text" class="form-control" id="student_cellphone" name="student_cellphone" value="{{ $user->studentPersonalDatas->student_cellphone }}">
            </div>
            <div class="form-group">
                <label for="student_tutor">Nombre del Tutor</label>
                <input type="text" class="form-control" id="student_tutor" name="student_tutor" value="{{ $user->studentPersonalDatas->student_tutor }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">ACTUALIZAR DATOS</button>
            </div>
        </form>

        <form action="{{ route('student.updateAddressData', $user->id_user) }}" method="POST">
            @csrf
            <h2 style="text-align: center;">Datos de Dirección</h2>
            @foreach($user->addressData as $address)
            <div class="form-group">
                <label for="postal_code">Código Postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $address->postal_code }}">
            </div>
            <div class="form-group">
                <label for="state_name">Estado</label>
                <input type="text" class="form-control" id="state_name" name="state_name" value="{{ $address->state_name }}">
            </div>
            <div class="form-group">
                <label for="municipality_name">Municipio</label>
                <input type="text" class="form-control" id="municipality_name" name="municipality_name" value="{{ $address->municipality_name }}">
            </div>
            <div class="form-group">
                <label for="colony_name">Colonia</label>
                <input type="text" class="form-control" id="colony_name" name="colony_name" value="{{ $address->colony_name }}">
            </div>
            <div class="form-group">
                <label for="street_name">Calle</label>
                <input type="text" class="form-control" id="street_name" name="street_name" value="{{ $address->street_name }}">
            </div>
            <div class="form-group">
                <label for="outdoor_number">Número Exterior</label>
                <input type="text" class="form-control" id="outdoor_number" name="outdoor_number" value="{{ $address->outdoor_number }}">
            </div>
            <div class="form-group">
                <label for="internal_number">Número Interior</label>
                <input type="text" class="form-control" id="internal_number" name="internal_number" value="{{ $address->internal_number }}">
            </div>
            <div class="form-group">
                <label for="geographics_references">Referencias Geográficas</label>
                <input type="text" class="form-control" id="geographics_references" name="geographics_references" value="{{ $address->geographics_references }}">
            </div>
            @endforeach

            <div class="text-center">
                <button type="submit" class="btn btn-success">ACTUALIZAR DATOS</button>
            </div>
        </form>

        <form action="{{ route('student.updateMedicalData', $user->id_user) }}" method="POST">
            @csrf
            <h2 style="text-align: center;">Datos Médicos</h2>
            <div class="form-group">
                <label for="medical_diagnostic">Diagnóstico Médico</label>
                <input type="text" class="form-control" id="medical_diagnostic" name="medical_diagnostic" value="{{ $user->medicalData->medical_diagnostic }}">
            </div>
            <div class="form-group">
                <label for="blood_type">Tipo de Sangre</label>
                <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{ $user->medicalData->blood_type }}">
            </div>
            <div class="form-group">
                <label for="allergy_name">Nombre de Alergia</label>
                <input type="text" class="form-control" id="allergy_name" name="allergy_name" value="{{ $user->medicalData->allergy_name }}">
            </div>
            <div class="form-group">
                <label for="additional_consideration">Consideraciones Adicionales</label>
                <input type="text" class="form-control" id="additional_consideration" name="additional_consideration" value="{{ $user->medicalData->additional_consideration }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">ACTUALIZAR DATOS</button>
            </div>
        </form>
    </div>
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
    @endauth

    @guest
    <h1>POR FAVOR INICIA SESIÓN PARA AUTENTIFICARSE <a href="/welcome">Iniciar Sesión</a></h1>

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

    
