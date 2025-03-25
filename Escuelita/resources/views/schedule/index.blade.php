@extends('adminlte::page')
@extends('adminlte::page')
@section('css')


<link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">


@vite(['resources/sass/app.scss', 'resources/js/app.js'])   
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection
@section('content')
<div class="container mt-4">
    <!-- Botón para crear un nuevo estado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Lista de Estados</h3>
        <a href="{{ route('schedule.create') }}" class="btn btn-success">Crear Horario</a>
    </div>

<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Dia</th>
                <th>Hora inicio</th>
                <th>Hora termino</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->days }}</td>
                    <td>{{ $schedule->time_start }}</td>
                    <td>{{ $schedule->time_end }}</td>
                    <td>
                        <a href="{{ route('horario.edit', $schedule->id) }}" class="btn-edit">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay horas disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
@endsection