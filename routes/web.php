<?php

use App\Console\Commands\DownloadDatabase;
use App\Http\Controllers\CalculoController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\InmueblesReportController;
use Illuminate\Support\Facades\Route;
use App\Livewire\PropietarioCrud;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PropietariosReportController;
use App\Http\Controllers\CalculosReportController;

Route::view('/', 'welcome');
Route::view('/acerca', 'historia');
Route::view('/archivos', 'descargar');
Route::view('/preguntas', 'preguntas');
Route::view('/requisitos', 'requisitos');

Route::middleware(['auth','estado'])->group(function () {
    // Route::view('Inicio', 'paginas.inicio')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::view('propietarios', 'paginas.propietarios')->name('propietarios');
    Route::view('sectores-calles', 'paginas.sectores-calles')->name('sectores-calles');
    Route::view('usuarios', 'paginas.usuarios')->name('usuarios');


    Route::view('auditoria', 'paginas.auditoria')->name('auditoria');
    Route::view('respaldo', 'paginas.respaldo')->name('respaldo');
    

    Route::view('calculo', 'paginas.calculo')->name('calculo');
    Route::view('ficha-catastral', 'paginas.ficha-catastral')->name('ficha-catastral');
    Route::view('division-unificacion', 'paginas.division-unificacion')->name('division-unificacion');
    Route::view('inspecciones', 'paginas.inspecciones')->name('inspecciones');
    Route::view('inmuebles', 'paginas.inmuebles')->name('inmuebles');
    Route::view('tareas', 'paginas.tareas')->name('tareas');
    Route::view('reportes', 'paginas.reportes')->name('reportes');
    Route::view('base-de-datos', 'paginas.base-de-datos')->name('base-de-datos');

    Route::get('/invoice/{id}/imprimir', [CalculoController::class, 'imprimir'])->name('invoices.imprimir');
    Route::get('/ficha/imprimir/{id}', [FichaController::class, 'ejemplo'])->name('ficha.imprimir');
    

    Route::get('/livewire-config', function () {
        $config = config('livewire.temporary_file_upload');
        return response()->json($config);
    });
    Route::get('/propietarioreporte', [PropietariosReportController::class, 'generateInvoice'])->name('propietarios.report');
    Route::get('/inmueblereporte', [InmueblesReportController::class, 'generateInvoice'])->name('inmuebles.report');
    Route::get('/calculoreporte', [CalculosReportController::class, 'generateInvoice'])->name('calculos.report');


    Route::get('/invoice', [InvoiceController::class, 'generateInvoice'])->name('invoice');
    Route::view('dashboard', 'paginas.inicio')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
});





require __DIR__.'/auth.php';
