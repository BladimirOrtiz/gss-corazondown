<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro de Pago</title>
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
                <a class="navbar-brand" href="{{ url('index.html') }}">
                    <img src="{{ asset('img/logo fcd.png') }}" class="rounded" id="logo" alt="Logo FCD" style="width: 40%; height: 70%;">
                </a>
                <a class="navbar-brand" href="{{ url('index.html') }}">
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
        <a href="{{ route('payregister.create', $user->id_user) }}" class="btn btn-light" title="Crear Registro de Pago">
            <img src="{{ asset('img/icons/payr.png') }}" alt="Imagen" width="50" height="50">
        </a>
        <a href="{{ route('payregister.show', $user->id_user) }}" class="btn btn-light" title="Listado de Pagos">
            <img src="{{ asset('img/icons/list.png') }}" alt="Imagen" width="50" height="50">
        </a>
        </a>
    </div>
    <br>

    <div class="container mt-5">
        <h2 style="text-align: center;">Editar Registro de Pago para {{ $user->username }}</h2>
        <form action="{{ route('payregister.update', ['id_user' => $user->id_user, 'id_register' => $register->id_pay_register]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pay_type" class="form-label">Forma de Pago</label>
                <select id="pay_type" name="pay_type" required>
                    <option selected disabled>Selecciona</option>
                    <option value="Transferencia Electrónica" {{ $register->pay_type == 'Transferencia Electrónica' ? 'selected' : '' }}>Transferencia Electrónica</option>
                    <option value="En Efectivo" {{ $register->pay_type == 'En Efectivo' ? 'selected' : '' }}>En Efectivo</option>
                </select>
                @error('pay_type')
                <small class="text-danger mt-1">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="school_cycle" class="form-label">Ciclo Escolar</label>
                <input type="text" class="form-control" id="school_cycle" name="school_cycle" value="{{ $register->school_cycle }}" required>
                @error('school_cycle')
                <small class="text-danger mt-1">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pay_month" class="form-label">Mes de Pago</label>
                <select class="form-control" id="pay_month" name="pay_month" required>
                    @foreach ([
                    '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
                    '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
                    '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
                    ] as $key => $value)
                    <option value="{{ $key }}" {{ $register->pay_month == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pay_date" class="form-label">Fecha de Pago</label>
                <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{ $register->pay_date }}" required>
            </div>

            <div class="mb-3">
                <label for="pay_import" class="form-label">Importe de Pago</label>
                <input type="number" class="form-control" id="pay_import" name="pay_import" value="{{ $register->pay_import }}" required>
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" id="discount_toggle" name="discount_toggle" {{ $register->discount_rate ? 'checked' : '' }}>
                <label class="form-check-label" for="discount_toggle">¿El Alumno es Becado?</label>
            </div>

            <div class="mb-3">
                <label for="discount_rate" class="form-label">Tasa de Descuento</label>
                <input type="number" step="0.01" class="form-control" id="discount_rate" name="discount_rate" value="{{ $register->discount_rate }}" min="0" max="1" {{ $register->discount_rate ? '' : 'disabled' }}>
            </div>

            <div class="mb-3">
                <label for="pay_concept" class="form-label">Concepto de Pago</label>
                <textarea class="form-control" id="pay_concept" name="pay_concept" required>{{ $register->pay_concept }}</textarea>
            </div>

            <div class="mb-3">
                <label for="pay_observation" class="form-label">Observaciones</label>
                <textarea class="form-control" id="pay_observation" name="pay_observation">{{ $register->pay_observation }}</textarea>
            </div>

            <br>
            <div class="text-center">
                    <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACIÓN</button>
                </div>
                    </form>

      
    </div>
</body>

<script>
    document.getElementById('discount_toggle').addEventListener('change', function() {
        var discountRateInput = document.getElementById('discount_rate');
        discountRateInput.disabled = !this.checked;
    });
</script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>