<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Registro de Datos de Domicilio </title>

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

    .form-group {
        margin-bottom: 15px;
    }

    .d-flex {
        display: flex;
        align-items: center;
    }

    .ml-2 {
        margin-left: 10px;
    }

    .btn {
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    small.txt-danger {
        color: red;
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

    <section>
    <div class="container d-flex">
        <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form">
            @csrf
            <h2 class="text-center">REGISTRO DE DATOS DE DOMICILIO DEL ESTUDIANTE</h2>

            <label for="postal_code">Código Postal:</label>
            <div class="d-flex">
                <input type="text" id="postal_code" name="postal_code" placeholder="Código Postal" value="{{ old('postal_code') }}" required>
                <button type="button" id="search_btn" class="btn btn-primary ml-2">Buscar</button>
            </div>
            @error('postal_code')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="state_name">Estado:</label>
            <input type="text" id="state_name" name="state_name" placeholder="Estado" value="{{ old('state_name') }}" oninput="capitalizeInput(this)" required>
            @error('state_name')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="municipality_name">Municipio:</label>
            <input type="text" id="municipality_name" name="municipality_name" placeholder="Municipio" value="{{ old('municipality_name') }}" oninput="capitalizeInput(this)" required>
            @error('municipality_name')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="colony_name">Colonia:</label>
            <input type="text" id="colony_name" name="colony_name" placeholder="Colonia" value="{{ old('colony_name') }}" oninput="capitalizeInput(this)" required>
            @error('colony_name')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
            <label for="state_name">Calle:</label>
            <input type="text" id="street_name" name="street_name" placeholder="Calle " value="{{ old('street_name') }}" oninput="capitalizeInput(this)" required>
            @error('colony_name')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="outdoor_number">Número Exterior:</label>
            <input type="text" id="outdoor_number" name="outdoor_number" placeholder="Número Exterior" value="{{ old('outdoor_number') }}">
            @error('outdoor_number')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="internal_number">Número Interior:</label>
            <input type="text" id="internal_number" name="internal_number" placeholder="Número Interior" value="{{ old('internal_number') }}">
            @error('internal_number')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <label for="geographics_references">Referencias:</label>
            <input type="text" id="geographics_references" name="geographics_references" placeholder="Referencias" value="{{ old('geographics_references') }}">
            @error('geographics_references')
            <small class="txt-danger mt-1">
                <strong>{{ $message }}</strong>
            </small>
            @enderror

            <div class="text-center">
                <button type="submit" class="btn btn-success">Siguiente</button>
            </div>
        </form>
    </div>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <script>
        function capitalizeInput(input) {
            const value = input.value;
            input.value = value.charAt(0).toUpperCase() + value.slice(1);
        }

        document.getElementById('search_btn').addEventListener('click', function() {
            const postalCode = document.getElementById('postal_code').value;
            fetch(`https://api.zippopotam.us/MX/${postalCode}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Código postal no encontrado.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.places && data.places.length > 0) {
                        const place = data.places[0];
                        document.getElementById('state_name').value = place['state'];
                        document.getElementById('colony_name').value = place['place name'];
                    } else {
                        alert('Código postal no encontrado.');
                    }
                })
                .catch(error => {
                    console.error('Error al consultar la API:', error);
                    alert('Hubo un error al consultar el código postal.');
                });
        });

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

        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>
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