<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CoberturaController;
use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\EmisoraProgramaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaiseController;
use App\Http\Controllers\TipoAfiliacioneController;
use App\Http\Controllers\TipoClienteController;
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
//Route::resource('coberturas', CoberturaController::class);
Route::get('/coberturas/{emisora_id}', function ($emisora_id) {
    return view('cobertura.index', ['emisora_id' => $emisora_id]);
});
Route::get('cobertura/{emisora}', function ($emisora_id) {
    return view('cobertura.index', ['emisora_id' => $emisora_id]);
})->name('cobertura');;
Route::get('emisoras/{id_emisora}/programas', [EmisoraProgramaController::class, 'index'])->name('emisora.programas.index');
Route::get('emisoras/{id_emisora}/programas/create', [EmisoraProgramaController::class, 'create'])->name('emisora.programas.create');
Route::post('emisoras/{id_emisora}/programas', [EmisoraProgramaController::class, 'store'])->name('emisora.programas.store');
Route::get('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'show'])->name('emisora.programas.show');
Route::get('emisoras/programas/{programa}/edit', [EmisoraProgramaController::class, 'edit'])->name('emisora.programas.edit');
Route::put('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'update'])->name('emisora.programas.update');
Route::delete('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'destroy'])->name('emisora.programas.destroy');
Route::resource('emisora-programas', EmisoraProgramaController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Clientes
Route::resource('clientes', ClienteController::class);
Route::resource('tipo-clientes', TipoClienteController::class);