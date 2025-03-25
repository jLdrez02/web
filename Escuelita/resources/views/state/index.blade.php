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
        <a href="{{ route('estado.create') }}" class="btn btn-success">Crear Estado</a>
    </div>

    <!-- Tabla con Bootstrap -->
    <div class="w-75 mx-auto table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($states as $state)
                    <tr>
                        <td>{{ $state->id }}</td>
                        <td>{{ $state->status }}</td>
                        <td>
                            <a href="{{ route('estado.edit', $state->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('estado.destroy', $state->id) }} " method="post" enctype="multipart/form-data">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No hay estados disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
<!-- Button trigger modal -->
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
 
@endsection