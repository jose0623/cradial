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
use Illuminate\Support\Facades\Auth; // <-- ¡Importación correcta de la Fachada Auth!
use Illuminate\Support\Facades\Route;


// ===========================================================================
// RUTAS PÚBLICAS (ACCESIBLES SIN INICIAR SESIÓN)
// ===========================================================================


// Rutas de autenticación (login, register, logout, password reset, etc.)
// NOTA: 'Auth::routes()' sin el parámetro ['verify' => true] desactiva la verificación de email.
//Auth::routes();


// Lógica condicional para la ruta raíz '/'
Route::get('/', function () {
    if (Auth::check()) {
        // Si el usuario está logueado, muestra la vista 'welcome'
        return view('welcome');
    } else {
        // Si el usuario NO está logueado, redirige a la página de login
        // La ruta 'login' es la ruta con nombre por defecto para la vista de login de Laravel/Jetstream.
        return redirect('/login');
    }
});




// ===========================================================================
// GRUPO DE RUTAS PROTEGIDAS POR EL MIDDLEWARE 'auth'
// Todas las rutas dentro de este grupo requerirán que el usuario esté autenticado.
// ===========================================================================
Route::middleware([
    'auth:sanctum', // Middleware de autenticación para Jetstream con Sanctum
    config('jetstream.auth_session'), // Middleware de sesión de Jetstream
    // 'verified', // <--- ¡IMPORTANTE!: Esta línea DEBE ESTAR ELIMINADA o comentada
                 //       si no quieres la verificación de correo electrónico.
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Home (si usas un controlador para /home)
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Rutas de administración de usuarios
    //Route::resource('admin/users', UserController::class);

    // Rutas para la gestión de usuarios
    Route::resource('users', UserController::class)->middleware(['auth']);

    // Regiones (Países, Estados, Municipios)
    Route::resource('regiones/paises', PaiseController::class);
    Route::resource('regiones/estados', EstadoController::class);
    Route::resource('regiones/municipios', MunicipioController::class);

    // Tipos de datos
    Route::resource('tipo-programas', TipoProgramaController::class);
    Route::resource('tipo-afiliaciones', TipoAfiliacioneController::class);
    Route::resource('tipo-emisoras', TipoEmisoraController::class);

    // Emisoras y sus relaciones (Coberturas, Programas, Fiestas)
    Route::resource('emisoras', EmisoraController::class);
    // Rutas de Cobertura (personalizadas)
    Route::get('/coberturas/{id_emisora}', function ($id_emisora) {
        return view('cobertura.index', ['id_emisora' => $id_emisora]);
    });
    Route::get('cobertura/{emisora}', function ($id_emisora) {
        return view('cobertura.index', ['id_emisora' => $id_emisora]);
    })->name('cobertura');

    // Rutas de EmisoraPrograma (anidadas)
    Route::get('emisoras/{id_emisora}/programas', [EmisoraProgramaController::class, 'index'])->name('emisora.programas.index');
    Route::get('emisoras/{id_emisora}/programas/create', [EmisoraProgramaController::class, 'create'])->name('emisora.programas.create');
    Route::post('emisoras/{id_emisora}/programas', [EmisoraProgramaController::class, 'store'])->name('emisora.programas.store');
    Route::get('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'show'])->name('emisora.programas.show');
    Route::get('emisoras/programas/{programa}/edit', [EmisoraProgramaController::class, 'edit'])->name('emisora.programas.edit');
    Route::put('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'update'])->name('emisora.programas.update');
    Route::delete('emisoras/programas/{programa}', [EmisoraProgramaController::class, 'destroy'])->name('emisora.programas.destroy');
    // Si esta es la ruta de recurso base, asegúrate de que no duplique las rutas anidadas
    Route::resource('emisora-programas', EmisoraProgramaController::class);

    // Clientes y Tipos de Cliente
    Route::resource('clientes', ClienteController::class);
    Route::resource('tipo-clientes', TipoClienteController::class);

    // Reportes y Reporte Items (anidadas)
    Route::resource('reportes', ReporteController::class);
    Route::get('reportes/{id_reporte}/reporte-items', [ReporteItemController::class, 'index'])->name('reportes.reporte-items.index');
    Route::get('reportes/{id_reporte}/reporte-items/create', [ReporteItemController::class, 'create'])->name('reportes.reporte-items.create');
    Route::post('reportes/{id_reporte}/reporte-items', [ReporteItemController::class, 'store'])->name('reportes.reporte-items.store');
    Route::get('reportes/{id_reporte}/reporte-items/trazabilidad', [ReporteItemController::class, 'trazabilidad'])->name('reportes.reporte-items.trazabilidad');
    Route::get('reportes/reporte-items/{programa}', [ReporteItemController::class, 'show'])->name('reportes.reporte-items.show');
    Route::get('reportes/reporte-items/{programa}/edit', [ReporteItemController::class, 'edit'])->name('reportes.reporte-items.edit');
    Route::put('reportes/reporte-items/{programa}', [ReporteItemController::class, 'update'])->name('reportes.reporte-items.update');
    Route::delete('reportes/reporte-items/{programa}', [ReporteItemController::class, 'destroy'])->name('reportes.reporte-items.destroy');
    Route::resource('reporte-items', ReporteItemController::class);

    // Rutas de Fiestas (anidadas)
    Route::get('emisoras/{id_emisora}/fiestas', [FiestaController::class, 'index'])->name('emisora.fiestas.index');
    Route::get('emisoras/{id_emisora}/fiestas/create', [FiestaController::class, 'create'])->name('emisora.fiestas.create');
    Route::post('emisoras/fiestas', [FiestaController::class, 'store'])->name('emisora.fiestas.store');
    Route::get('emisoras/fiestas/{fiesta}', [FiestaController::class, 'show'])->name('emisora.fiestas.show');
    Route::get('emisoras/fiestas/{fiesta}/edit', [FiestaController::class, 'edit'])->name('emisora.fiestas.edit');
    Route::put('emisoras/fiestas/{fiesta}', [FiestaController::class, 'update'])->name('emisora.fiestas.update');
    Route::delete('emisoras/fiestas/{fiesta}', [FiestaController::class, 'destroy'])->name('emisora.fiestas.destroy');
    // Route::resource('emisoras.fiestas', FiestaController::class); // Esta línea está comentada, lo cual es correcto si usas las rutas anidadas explícitas.

    // Reportes en Excel/PDF para Emisoras
    Route::get('/emisoras/{emisora}/reporte/excel', [EmisoraController::class, 'generarExcel'])->name('emisoras.reporte.excel');
    Route::get('/emisoras/{emisora}/reporte/pdf', [EmisoraController::class, 'generarPdf'])->name('emisoras.reporte.pdf');

    // Ruta de Selects Anidados (ejemplo, si necesita ser protegida)
    Route::get('/selects-anidados', function () {
        return view('selects-anidados');
    });

}); // Fin del grupo de rutas protegidas