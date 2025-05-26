<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CoberturaController;
use App\Http\Controllers\EmisoraController;
use App\Http\Controllers\EmisoraProgramaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FiestaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PaiseController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReporteItemController;
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
Route::get('/coberturas/{id_emisora}', function ($id_emisora) {
    return view('cobertura.index', ['id_emisora' => $id_emisora]);
});
Route::get('cobertura/{emisora}', function ($id_emisora) {
    return view('cobertura.index', ['id_emisora' => $id_emisora]);
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

//Reportes
Route::resource('reportes', ReporteController::class);


Route::get('/selects-anidados', function () {
    return view('selects-anidados');
});


Route::get('reportes/{id_reporte}/reporte-items', [ReporteItemController::class, 'index'])->name('reportes.reporte-items.index');
Route::get('reportes/{id_reporte}/reporte-items/create', [ReporteItemController::class, 'create'])->name('reportes.reporte-items.create');
Route::post('reportes/{id_reporte}/reporte-items', [ReporteItemController::class, 'store'])->name('reportes.reporte-items.store');
Route::get('reportes/reporte-items/{programa}', [ReporteItemController::class, 'show'])->name('reportes.reporte-items.show');
Route::get('reportes/reporte-items/{programa}/edit', [ReporteItemController::class, 'edit'])->name('reportes.reporte-items.edit');
Route::put('reportes/reporte-items/{programa}', [ReporteItemController::class, 'update'])->name('reportes.reporte-items.update');
Route::delete('reportes/reporte-items/{programa}', [ReporteItemController::class, 'destroy'])->name('reportes.reporte-items.destroy');
Route::resource('reporte-items', ReporteItemController::class);

Route::get('emisoras/{id_emisora}/fiestas', [FiestaController::class, 'index'])->name('emisora.fiestas.index');
Route::get('emisoras/{id_emisora}/fiestas/create', [FiestaController::class, 'create'])->name('emisora.fiestas.create');
Route::post('emisoras/fiestas', [FiestaController::class, 'store'])->name('emisora.fiestas.store');
Route::get('emisoras/fiestas/{fiesta}', [FiestaController::class, 'show'])->name('emisora.fiestas.show');
Route::get('emisoras/fiestas/{fiesta}/edit', [FiestaController::class, 'edit'])->name('emisora.fiestas.edit');
Route::put('emisoras/fiestas/{fiesta}', [FiestaController::class, 'update'])->name('emisora.fiestas.update');
Route::delete('emisoras/fiestas/{fiesta}', [FiestaController::class, 'destroy'])->name('emisora.fiestas.destroy');
//Route::resource('emisoras.fiestas', FiestaController::class);


Route::get('/emisoras/{emisora}/reporte/excel', [EmisoraController::class, 'generarExcel'])->name('emisoras.reporte.excel');
Route::get('/emisoras/{emisora}/reporte/pdf', [EmisoraController::class, 'generarPdf'])->name('emisoras.reporte.pdf');