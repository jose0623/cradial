<?php

use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaiseController;
use App\Http\Controllers\TipoAfiliacioneController;
use App\Http\Controllers\TipoEmisoraController;
use App\Http\Controllers\TipoProgramaController;
use App\Http\Controllers\UserController;
use App\Models\Municipio;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('admin/users', UserController::class);

Route::resource('regiones/paises', PaiseController::class);
Route::resource('regiones/estados', EstadoController::class);
Route::resource('regiones/municipios', MunicipioController::class);

Route::resource('tipo-programas', TipoProgramaController::class);
Route::resource('tipo-afiliaciones', TipoAfiliacioneController::class);
Route::resource('tipo-emisoras', TipoEmisoraController::class);
Route::resource('emisoras', EmisoraController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

