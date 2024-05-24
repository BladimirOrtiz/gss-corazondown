<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kardex PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <style>
.styled-table {
    width: 100%;
    border-collapse: collapse;
}

.styled-table th,
.styled-table td {
    padding: 12px;
    border: 1px solid #dddddd;
    text-align: left;
    color: white; /* Cambia el color del texto a blanco */
}

.styled-table th {
    background-color: #f00; /* Cambia el color de fondo a rojo */
} 

         </style>
<div>
<img src="img/logo fcd.png" class="rounded float-start custom-image" style="width: 100px; height: 100px;">
</div>
<div>
<img src="img/gss.png" class="rounded float-end custom-image" style="width: 100px; height: 100px;">
</div>
<br>
<br>
<br>
<p class="text-center"><strong>Ciclo Escolar:</strong> {{ $schoolCycle }}</p>
    <p class="text-center"><strong>Alumno:</strong> {{ $user->student_name }} {{ $user->student_lastnames }}</p>
<section>
<section>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Mes de Pago</th>
                        <th>Fecha de Pago</th>
                        <th>Importe de Pago</th>
                        <th>Tasa de Descuento</th>
                        <th>Código QR</th>
                        <th>Concepto de Pago</th>
                        <th>Observación de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payRegisters as $payRegister)
                    <tr>
                        <td>{{ $payRegister->pay_month }}</td>
                        <td>{{ $payRegister->pay_date }}</td>
                        <td>{{ $payRegister->pay_import }}</td>
                        <td>{{ $payRegister->discount_rate }}</td>
                        <td>{{ $payRegister->qr_code }}</td>
                        <td>{{ $payRegister->pay_concept }}</td>
                        <td>{{ $payRegister->pay_observation }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>