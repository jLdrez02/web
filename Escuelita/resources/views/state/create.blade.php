@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Añadir un estado</h2>
</div>
<div class="row">
     
       <form action="{{ route('estado.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
               <label for="estatus">Estatus</label>
               <input type="text" class="form-control" id="estatus" name="estatus" value="{{old('estatus')}}" />
           </div>
           <button type="submit" class="btn btn-success">Guardar Estatus</button>
       </form>
   </div>
</div>
@endsection
