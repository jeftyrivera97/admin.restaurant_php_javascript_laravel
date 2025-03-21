<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\PlanillaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('ingreso', IngresoController::class);
Route::resource('planilla', PlanillaController::class);
Route::resource('compra', CompraController::class);
Route::resource('gasto', GastoController::class);
Route::resource('producto', ProductoController::class);
Route::resource('empleado', EmpleadoController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('proveedor', ProveedorController::class);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('/');

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/compraDetalle/{id}', [CompraController::class, 'detalle'])->middleware(['auth', 'verified'])->name('compraDetalle');
Route::post('/storeDetalle', [CompraController::class, 'storeDetalle'])->middleware(['auth', 'verified'])->name('storeDetalle');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
