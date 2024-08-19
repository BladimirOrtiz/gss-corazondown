<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/payregister.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Consultar Cartilla de Pago</title>
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

        * Estilos para la barra de navegación */ #navbar {
            background-color: #2096ea;
            padding: 10px 0;
            /* Añadir espacio en la parte superior e inferior */
        }

        #navbar ul {
            padding-left: 0;
            list-style: none;
            text-align: center;
            margin: 0;
            /* Eliminar el margen */
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

        footer {
            max-width: 100%;
            height: auto;
            background-color: red;

        }

        .social-icons .social-icon {
            display: inline-block;
            margin-right: 10px;
            color: #333;
            /* Cambia el color de los iconos de redes sociales según lo necesites */
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

        .styled-table th,
        .styled-table td {
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

            .styled-table,
            .styled-table tbody,
            .styled-table tr,
            .styled-table td {
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

        #menu>li>a {
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

        #menuToggle:focus+#submenu,
        #submenu:hover {
            display: block;
        }

        .button-container {
            display: flex;
            gap: 10px;
            /* Espacio entre los botones, ajusta según sea necesario */
            align-items: center;
            /* Alinea verticalmente los elementos al centro */
        }

        .delete-form {
            margin: 0;
            /* Elimina el margen para que no afecte la alineación */
        }
    </style>
</head>

<body>
    <nav id="navbar" class="navbar navbar-light sticky-top" style="background-color: #292137">
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

    <div class="container">
        <a class="button" href="/welcomepanel">
            <span>
                Inicio
            </span>
        </a>

    </div>
    <br><br>
    <section>
        <div>
            <!-- Formulario para school_cycle -->
            <form method="POST" action="{{ route('cycleschoolkardex') }}">
                @csrf
                <div>
                    <label for="school_cycle">Seleccionar Ciclo Escolar:</label>
                    <select id="school_cycle" name="school_cycle" onchange="this.form.submit()">
                        @foreach($schoolCycles as $cycle)
                        <option value="{{ $cycle }}" {{ $cycle == $selectedCycle ? 'selected' : '' }}>{{ $cycle }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

            <!-- Tabla de datos -->
            <div class="table-container">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Forma de Pago</th>
                            <th>Ciclo Escolar</th>
                            <th>Mes de Pago</th>
                            <th>Fecha de Pago</th>
                            <th>Importe de Pago</th>
                            <th>Abono</th>
                            <th>Pagos Restantes</th>
                            <th>Código QR</th>
                            <th>Concepto de Pago</th>
                            <th>Observación de Pago</th>
                        </tr>
                    </thead>
                    <tbody id="pay_register_table_body">
                        @php
                        $months = [
                        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                        '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
                        '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
                        ];
                        @endphp
                        @foreach($payRegisters as $register)
                        <tr>
                            <td data-label="Forma de Pago">{{ $register->pay_type }}</td>
                            <td data-label="Ciclo Escolar">{{ $register->school_cycle }}</td>
                            <td data-label="Mes de Pago">{{ $months[$register->pay_month] }}</td>
                            <td data-label="Fecha de Pago">{{ $register->pay_date }}</td>
                            <td data-label="Importe de Pago">{{ $register->pay_import }}</td>
                            <td data-label="Abono">{{ $register->payment }}</td>
                            <td data-label="Pagos Restantes">{{ $register->remain_pay }}</td>
                            <td data-label="Código QR">
                                <img src="data:image/png;base64,{{ $register->qr_code }}" alt="QR Code">
                            </td>
                            <td data-label="Concepto de Pago">{{ $register->pay_concept }}</td>
                            <td data-label="Observación de Pago">{{ $register->pay_observation }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
</body>

</html>