@extends('adminlte::page')
@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Imágenes y Videos</h2>

    <div class="row">
        @foreach ($assets as $asset)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $asset->title }}</h5>

                        <!-- Mostrar Imagen con ruta completa -->
                        <img src="{{ asset('storage/app/images/' . $asset->image) }}" class="img-fluid" alt="Imagen de {{ $asset->title }}">

                        <!-- Mostrar Video con ruta completa -->
                        <video class="w-100 mt-2" controls>
                            <source src="{{ asset('storage/app/videos/' . $asset->video_path) }}" type="video/mp4">
                            Tu navegador no soporta el video.
                        </video>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
