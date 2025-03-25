@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Añadir una hora de clase</h2>
</div>
<div class="row">
     
        <form action="{{ route('horario.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
            @csrf 
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif

           <div class="form-group">
    <label for="days">Días:</label>
    <select id="days" name="days">
        <option value="">Seleccione un día</option>
        <option value="Lunes" {{ old('days') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
        <option value="Martes" {{ old('days') == 'Martes' ? 'selected' : '' }}>Martes</option>
        <option value="Miércoles" {{ old('days') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
        <option value="Jueves" {{ old('days') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
        <option value="Viernes" {{ old('days') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
    </select>
            </div>


        <div class="form-group">
            <label for="time_start">Hora de Inicio:</label>
            <input type="time" id="time_start" name="time_start" value="{{ old('time_start') }}">
        </div>

        <div class="form-group">
            <label for="time_end">Hora de Fin:</label>
            <input type="time" id="time_end" name="time_end" value="{{ old('time_end') }}">
        </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        </form>
   </div>
</div>
@endsection
