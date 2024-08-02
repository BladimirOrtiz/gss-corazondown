<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kardex PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        .table-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
        }

        .styled-table thead tr {
            background-color: red;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: center;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid red;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        .styled-table tbody td {
            color: #333333;
        }

        @media print {
            .table-container {
                width: 100%;
            }

            .styled-table {
                page-break-inside: avoid;
            }
        }
    </style>
    <div>
        <img src="img/logo fcd.png" class="rounded float-start custom-image" style="width: 100px; height: 100px;">
    </div>
    <div>
        <img src="img/gss.png" class="rounded float-end custom-image" style="width: 100px; height: 100px;">
    </div>
    <br><br><br>
    <p class="text-center"><strong>CICLO ESCOLAR:</strong> {{ $schoolCycle }}</p>
    <p class="text-center"><strong>ALUMNO:</strong> {{ $studentData->student_name }} {{ $studentData->student_lastnames }}</p>

    <section>
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>FORMA DE PAGO</th>
                        <th>MES DE PAGO</th>
                        <th>FECHA DE PAGO</th>
                        <th>IMPORTE DE PAGO</th>
                        <th>TASA DE DESCUENTO</th>
                        <th>CONCEPTO DE PAGO</th>
                        <th>OBSERVACIÓN DE PAGO</th>
                        <th>CÓDIGO QR</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td data-label="Mes de Pago">{{ $months[$register->pay_month] }}</td>
                            <td data-label="Fecha de Pago">{{ $register->pay_date }}</td>
                            <td data-label="Importe de Pago">${{ $register->pay_import }}</td>
                            <td data-label="Tasa de Descuento">{{ $register->discount_rate * 100 }}%</td>
                            <td data-label="Concepto de Pago">{{ $register->pay_concept }}</td>
                            <td data-label="Observación de Pago">{{ $register->pay_observation }}</td>
                            <td data-label="Código QR">
                                @if ($register->qr_code)
                                    <img src="data:image/png;base64,{{ $register->qr_code }}" alt="QR Code" width="90">
                                @endif
                            </td>
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
