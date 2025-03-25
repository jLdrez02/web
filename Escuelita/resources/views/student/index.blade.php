@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])   
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Lista de Estudiantes</h3>
        <a href="{{ route('student.create') }}" class="btn btn-success">Añadir Estudiante</a>
        <a href="{{ route('students.pdf') }}" class="btn btn-primary">Generar PDF</a>

    </div>

    <!-- <div class="mb-3">
        <input type="text" id="searchBox" class="form-control" placeholder="Buscar por nombre...">
    </div> -->

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
                    <th>Acciones</th>
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
                        <td class="d-flex">
                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary btn-sm me-2">Editar</a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Baja definitiva</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay estudiantes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#studentsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/Spanish.json"
                }
            });

            $('#searchBox').on('keyup', function() {
                table.columns(1).search(this.value).draw();
            });
        });
    </script>
@endsection