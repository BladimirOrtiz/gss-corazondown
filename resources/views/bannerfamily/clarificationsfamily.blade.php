<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.pinimg.com/736x/d1/1d/47/d11d4792f3f30e8ec60195d583e1694b.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/clarification.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Sección de Quejas y Aclaraciones</title>
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
    <br>
    <div class="container">
    <a class="button" href="/welcomepanel">
      <span>
        Inicio
      </span>
    </a>
    <a class="button" href="/readclarification">
      <span>
        <i class="fas fa-list"></i> Lista de Procesos
      </span>
    </a>

  </div>
    <br>

    <section>
        <div class="container d-flex">
            <form action="" method="post" class="m-auto bg-white p-5 rounded-sm shadow-lg w-form ">
                @csrf
                <h2 class="text-center">CREAR UNA ACLARACIÓN O QUEJA</h2>
                <div class="form-group"> <!-- Process Folio -->
                    <label for="exampleInputName" class="control-label">Folio del Proceso </label>
                    <input type="text" class="form-control" name="clarification_folio" id="clarification_folio" value="{{ $folio }}" readonly>
                    @error('clarification_folio')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div>
                    <label for="student_grender">Categoría del Proceso:</label>
                    <select id="student_grender" name="clarifications_category" required>
                        <option selected disabled>Selecciona</option>
                        <option value="Aclaración" {{ old('clarifications_category') == 'Aclaración' ? 'selected' : '' }}>Aclaración</option>
                        <option value="Queja" {{ old('clarifications_category') == 'Queja' ? 'selected' : '' }}>Queja</option>
                    </select>
                    @error('student_grender')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div class="form-group"> <!-- Description Process  -->
                    <label for="full_name_id" class="control-label">Descripción del Proceso</label>
                    <input type="text" class="form-control" id="description_clarification" name="description_clarification" placeholder="Descripción del Proceso<">
                    @error('description_clarification')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>
                <div class="form-group"> <!-- Create Date  -->
                    <label for="creation_time" class="form-label"><strong>Fecha de Creacion</strong></label>
                    <input type="date" class="form-control" name="clarification_date" id="creation_date" value="">
                    @error('clarification_date')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div class="form-group"> <!-- State Process  -->
                    <label for="full_name_id" class="control-label">Estado del Proceso</label>
                    <input type="hidden" id="clarification_state" name="clarification_state" value="en_proceso">
                    @error('clarification_state')
                    <small class="txt-danger mt-1">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>


                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar Proceso</button>
                </div>
                <br>
                <div class="container">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Obtener la fecha y hora actual
                        const now = new Date();

                        // Formatear la fecha en formato YYYY-MM-DD
                        const formattedDate = now.toISOString().split("T")[0];


                        // Establecer la fecha y hora en los campos respectivos
                        document.getElementById("creation_date").value = formattedDate;
                    });
                    app.post('/register', (req, res) => {
                        const {
                            password,
                            clarification_state
                        } = req.body;
                        const state = clarification_state || 'en_proceso'; // Asegurar que el estado predeterminado sea 'en_proceso'

                        // Aquí iría la lógica para registrar al usuario en la base de datos
                        // ...

                        res.send('Usuario registrado con estado ' + state);
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
                </script>



                </script>
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