<?php

use App\Http\Controllers\CuentasController;
use App\Http\Controllers\MovimientosController;
use Illuminate\Support\Facades\Route;


//escribe las Rutas de tu aplicacion aqui
Route::get('/cuentas', [CuentasController::class, 'index'])->name('cuentas.index');
Route::get('/cuentas/create', [CuentasController::class, 'create'])->name('cuentas.create');
Route::post('/cuentas/create', [CuentasController::class, 'store'])->name('cuentas.store');
// movimientos
Route::get('/movimientos/{id}', [MovimientosController::class, 'index'])->name('movimientos.index');
Route::get('/movimientos/create/{id}', [MovimientosController::class, 'ingreso'])->name('movimiento.ingreso'); // vista ingresar
Route::post('/movimientos/create/{id}', [MovimientosController::class, 'store'])->name('movimiento.ingresar');
Route::get('/movimientos/retiro/{id}', [MovimientosController::class, 'retiro'])->name('movimiento.retiro'); // vista retirar
Route::post('/movimientos/retiro/{id}', [MovimientosController::class, 'store'])->name('movimiento.retirar');

