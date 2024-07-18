<?php

use App\Http\Controllers\CallesController;
use App\Http\Controllers\InmuebleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Propietario;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\SectoresController;
use App\Http\Controllers\InmueblesController;
use App\Http\Controllers\UsuariosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/propietariosapi', PropietarioController::class)->name('api.propietarios.index');
Route::get('/sectoresapi', SectoresController::class)->name('api.sectores.index');
Route::get('/callesapi', CallesController::class)->name('api.calles.index');
Route::get('/inmueblesapi', InmuebleController::class)->name('api.inmuebles.index');
Route::get('/usuariosapi', UsuariosController::class)->name('api.usuarios.index');