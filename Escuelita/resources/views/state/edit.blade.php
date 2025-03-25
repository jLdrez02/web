@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Estado </h2>
       <form action="{{ route('estado.update', $state->id
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
               <label for="state">Estado</label>
               <textarea class="form-control" id="state" name="state" >{{ old('state', $state->status) }}</textarea>
           </div>
           <button type="submit" class="btn btn-success">Actualizar estado</button>
       </form>
   </div>
</div>
@endsection
