<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssetController;

Route::resource('estado', App\Http\Controllers\StateController::class);
Route::resource('horario', App\Http\Controllers\ScheduleController::class);
Route::resource('student', App\Http\Controllers\StudentController::class);
Route::resource('asset', App\Http\Controllers\AssetController::class);



Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Estados
Route::get('/lista.estado', [StateController::class, 'index'])->name('state.index');
Route::get('/crear.estado', function () { return view('state.create'); });
Route::get('/editar.estado', function () { return view('state.edit'); });
Route::get('/borrar.estado', function () { return view('state.destroy'); });


//Horarios
Route::get('/lista.horas', [ScheduleController::class, 'index'])->name('horas.index');
Route::get('/crear.horas', function () { return view('schedule.create'); });
Route::get('/editar.horas', function () { return view('schedule.edit'); });

Route::get('/lista.estudiante', [StudentController::class, 'index'])->name('student.index');
Route::get('/crear.estudiante', function () { return view('student.create'); });
Route::get('/editar.estudiante', function () { return view('student.edit'); });
Route::get('/borrar.estudiante', function () { return view('student.destroy'); });
Route::get('/pdf.estudiantes', [StudentController::class, 'imprimirPDF'])->name('students.pdf');

Route::get('/inicio', function () { return view('index.index'); });



//->middleware('auth')
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/subir.multi', function () { return view('asset.create'); });
Route::get('/video-file/{filename}', array(
    'as' => 'fileVideo',
    'uses' => 'App\Http\Controllers\VideoController@getVideo'
 ));
 Route::get('/miniatura/{filename}', array(
    'as' => 'imageVideo',
    'uses' => 'App\Http\Controllers\VideoController@getImage'
 ));

 Route::get('/assets', [AssetController::class, 'index'])->name('asset.index');

 

