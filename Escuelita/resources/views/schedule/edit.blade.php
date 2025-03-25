@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar horario </h2>
       <form action="{{ route('horario.update', $schedule->id
) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf 
           @method('PUT')
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
               <select id="days" name="days" class="form-control">
                   <option value="Lunes" {{ (old('days', $schedule->days) == 'Lunes') ? 'selected' : '' }}>Lunes</option>
                   <option value="Martes" {{ (old('days', $schedule->days) == 'Martes') ? 'selected' : '' }}>Martes</option>
                   <option value="Miércoles" {{ (old('days', $schedule->days) == 'Miércoles') ? 'selected' : '' }}>Miércoles</option>
                   <option value="Jueves" {{ (old('days', $schedule->days) == 'Jueves') ? 'selected' : '' }}>Jueves</option>
                   <option value="Viernes" {{ (old('days', $schedule->days) == 'Viernes') ? 'selected' : '' }}>Viernes</option>
               </select>
           </div>


           <div class="form-group">
               <label for="time_start">Hora de Inicio:</label>
               <input 
                   type="time" id="time_start" name="time_start" class="form-control"  value="{{ old('time_start', $schedule->time_start) }}">
           </div>


           <div class="form-group">
               <label for="time_end">Hora de Fin:</label>
               <input type="time"  id="time_end" name="time_end" class="form-control" value="{{ old('time_end', $schedule->time_end) }}">
           </div>
           <button type="submit" class="btn btn-success">Actualizar Horario</button>
       </form>
   </div>
</div>
@endsection