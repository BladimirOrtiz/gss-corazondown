<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/clarification.css') }}">
    <title>Registro de Padre de Familia</title>
</head>

<body>
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

    <section>
        <div class="container d-flex">
            <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
                @csrf
                <h2 class="text-center">REGISTRO DE USUARIO</h2>
                <br>
                <div class="form-group"> <!-- User Name -->
                    <label for="exampleInputName" class="control-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Nombre de Usuario" value="{{ old('username') }}">
                    @error('username')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
                <div class="form-group"> <!-- Email Address -->
                    <label for="email_address" class="control-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_address" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}">
                    @error('email')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
            <br>
                <div>
                    <label for="student_grender">Rol del Usuario:</label>
                    <select id="student_grender" name="rol_system" required>
                        <option selected disabled>Selecciona</option>
                        <option value="Padre de Familia" {{ old('rol_system') == 'PadredeFamilia' ? 'selected' : '' }}>Padre de Familia</option>
                        <option value="Administrador" {{ old('rol_system') == 'Administrador' ? 'selected' : '' }}>Administrador4</option>
                    </select>
                    @error('rol_system')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div class="form-group"> <!-- Password -->
                    <label for="password" class="control-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                    @error('password')
                    <small class="text-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
                <br>
                <div class="container">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </section>

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
                            <img src="img/icons/ficon.png" class="rounded" alt="Facebook" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://x.com/mariopmtz" class="social-icon">
                            <img src="img/icons/xicon.png" class="rounded" alt="Twitter" style="width: 60%; height: 70%;">
                        </a>
                        <a href="https://www.instagram.com/fundacioncorazondown?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon">
                            <img src="img/icons/insicon.png" class="rounded" alt="Instagram" style="width: 70%; height: 70%;">
                        </a>
                        <a href="https://www.tiktok.com/@corazndown?is_from_webapp=1&sender_device=pc" class="social-icon">
                            <img src="img/icons/ticon.png" class="rounded" alt="TikTok" style="width: 70%; height: 70%;">
                        </a>
                    </div>
                    <div class="location text-center">
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

</html>
