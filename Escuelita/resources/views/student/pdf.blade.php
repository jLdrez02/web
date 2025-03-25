

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #2e7d32;
            font-weight: bold;
            text-align: center;
        }

        .btn-secondary {
            display: inline-block;
            background-color: #81c784;
            border: none;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #66bb6a;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #c8e6c9;
        }

        .table-hover tbody tr:hover {
            background-color: #a5d6a7;
        }

        .table-dark {
            background-color: #2e7d32 !important;
            color: white;
        }

        @media print {
            @page {
                size: A4 landscape; 
                margin: 1cm;
                orientation: landscape;
            }
            body * {
                visibility: hidden;
            }
            .print-container, .print-container * {
                visibility: visible;
            }
            .print-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container print-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Lista de Estudiantes</h3>
            <a href="/lista.estudiante" class="btn-secondary d-print-none">Regresar</a>
        </div>

        <div class="w-100 table-responsive">
            <table class="table table-striped table-hover" id="studentsTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>CURP</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Último Grado</th>
                        <th>Teléfono de Emergencia</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td class="student-name">{{ $student->name }}</td>
                        <td>{{ $student->lastname }}</td>
                        <td>{{ $student->lastnameM }}</td>
                        <td>{{ $student->CURP }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->lastgrade }}</td>
                        <td>{{ $student->phoneDisease }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay estudiantes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable({
                paging: true,
                searching: false,
                ordering: true,
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/Spanish.json"
                }
            });
        });
    </script>
</body>
</html>

