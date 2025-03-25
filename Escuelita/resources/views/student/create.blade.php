@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Añadir un Estudiante</h2>
   </div>
   <div class="row">
       <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
               <label for="name">Nombre</label>
               <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required />
           </div>
           <div class="form-group">
               <label for="lastname">Apellido Paterno</label>
               <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}" required />
           </div>
           <div class="form-group">
               <label for="lastnameM">Apellido Materno</label>
               <input type="text" class="form-control" id="lastnameM" name="lastnameM" value="{{old('lastnameM')}}" required />
           </div>
           <div class="form-group">
               <label for="birthday">Fecha de Nacimiento</label>
               <input type="date" class="form-control" id="birthday" name="birthday" value="{{old('birthday')}}" required />
           </div>
           <div class="form-group">
               <label for="placeBirth">Lugar de Nacimiento</label>
               <input type="text" class="form-control" id="placeBirth" name="placeBirth" value="{{old('placeBirth')}}" required />
           </div>
           <div class="form-group">
               <label for="CURP">CURP</label>
               <input type="text" class="form-control" id="CURP" name="CURP" value="{{old('CURP')}}" required />
           </div>
           <div class="form-group">
               <label for="address">Dirección</label>
               <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" required />
           </div>
           <div class="form-group">
               <label for="cp">Código Postal</label>
               <input type="text" class="form-control" id="cp" name="cp" value="{{old('cp')}}" required />
           </div>
           <div class="form-group">
               <label for="municipality">Municipio</label>
               <input type="text" class="form-control" id="municipality" name="municipality" value="{{old('municipality')}}" required />
           </div>
           <div class="form-group">
               <label for="phone">Teléfono</label>
               <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required />
           </div>
           <div class="form-group">
               <label for="statusCivil">Estado Civil</label>
               <input type="text" class="form-control" id="statusCivil" name="statusCivil" value="{{old('statusCivil')}}" required />
           </div>
           <div class="form-group">
               <label for="occupation">Ocupación</label>
               <input type="text" class="form-control" id="occupation" name="occupation" value="{{old('occupation')}}" required />
           </div>
           <div class="form-group">
               <label for="lastgrade">Último Grado de Estudios</label>
               <input type="text" class="form-control" id="lastgrade" name="lastgrade" value="{{old('lastgrade')}}" required />
           </div>
           <div class="form-group">
               <label for="chronicDisease">¿Padece Alguna Enfermedad Crónica?</label>
               <input type="text" class="form-control" id="chronicDisease" name="chronicDisease" value="{{old('chronicDisease')}}" />
           </div>
           <div class="form-group">
               <label for="nameDisease">Nombre de la Enfermedad</label>
               <input type="text" class="form-control" id="nameDisease" name="nameDisease" value="{{old('nameDisease')}}" />
           </div>
           <div class="form-group">
               <label for="phoneDisease">Teléfono de Contacto Médico</label>
               <input type="text" class="form-control" id="phoneDisease" name="phoneDisease" value="{{old('phoneDisease')}}" />
           </div>
          
           <button type="submit" class="btn btn-success">Guardar Estudiante</button>
       </form>
   </div>
</div>
@endsection