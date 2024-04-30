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


Route::get('/', function () {
    if(!Auth::check())
    {
        return redirect('/login');
    }else{
        return view('dashboard');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
