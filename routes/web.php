<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

/** Dita's original routes */
// Route::get('/alat_berat', [EquipmentController::class, 'index']);

// Route::post('/tambah_alat/post', [EquipmentController::class, 'store']);

// Route::get('/tambah_alat', [EquipmentController::class, 'create']);

// Route::get('/edit_alat', [EquipmentController::class, 'edit']);

// Route::post('/edit_alat/edit', [EquipmentController::class, 'update']);

/** Dave's improved routes */

// Route::name('equipments.')->group(function () {
//     Route::get('equipments', [EquipmentController::class, 'index'])->name('index');
//     Route::get('equipments/create', [EquipmentController::class, 'create'])->name('create');
//     Route::post('equipments', [EquipmentController::class, 'store'])->name('store');
//     Route::get('equipments/{equipment}', [EquipmentController::class, 'show'])->name('show');
//     Route::get('equipments/{equipment}/edit', [EquipmentController::class, 'edit'])->name('edit');
//     Route::put('equipments/{equipment}', [EquipmentController::class, 'update'])->name('update');
//     Route::delete('equipments/{equipment}', [EquipmentController::class, 'destroy'])->name('destroy');
// });

Route::resource('equipments', EquipmentController::class);
