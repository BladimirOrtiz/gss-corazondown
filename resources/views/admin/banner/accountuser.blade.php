<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/accountuser.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>GESTIÓN DE USUARIOS</title>
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
        <a href="/createuser" class="btn btn-light" title="Listado de Padres">
            <img src="{{ asset('img/icons/au.png') }}" alt="Imagen" width="50" height="50">
        </a>

    </div>

    <br>

    <section>
        <div class="table-container">
            <h2>GESTIÓN DE USUARIOS</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE DE USUARIO</th>
                        <th>EMAIL</th>
                        <th>ROL DEL USUARIO</th>
                        <th>CONTRASEÑA</th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol_system }}</td>
                        <td>
                            <span class="password">**********</span>
                        </td>
                        <td class="button-container">
                            <a href="{{ route('users.edit', ['id_user' => $user->id_user]) }}" class="btn btn-light" title="Actualizar Registro del Usuario">
                                <img src="https://png.pngtree.com/png-vector/20220608/ourmid/pngtree-update-icon-on-white-background-png-image_4915764.png" alt="Imagen" width="50" height="50">
                            </a>
                            <form action="{{ route('users.destroy', ['id_user' => $user->id_user]) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3807/3807871.png" alt="Imagen" width="50" height="50">
                                </button>
                            </form>
                        </td>



                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('.toggle-password').forEach(button => {
                    button.addEventListener('click', function() {
                        const passwordField = this.previousElementSibling;
                        if (passwordField.textContent === '**********') {
                            // Aquí deberías obtener la contraseña real de forma segura
                            // por ejemplo, a través de una solicitud AJAX.
                            fetch('/get-password') // Este es un ejemplo de ruta
                                .then(response => response.text())
                                .then(password => {
                                    passwordField.textContent = password;
                                    this.textContent = 'Ocultar';
                                });
                        } else {
                            passwordField.textContent = '**********';
                            this.textContent = 'Mostrar';
                        }
                    });
                });
            });
        </script>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const passwordSpan = this.previousElementSibling;
                    if (passwordSpan.textContent.includes('*')) {
                        passwordSpan.textContent = 'Contraseña oculta'; // Aquí puedes mostrar un mensaje seguro
                        this.textContent = 'Ocultar';
                    } else {
                        passwordSpan.textContent = '**********';
                        this.textContent = 'Mostrar';
                    }
                });
            });
        });
    </script>
</body>

</html>