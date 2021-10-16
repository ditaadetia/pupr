<?php

use App\Http\Controllers\AlbertController;
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

Route::get('/alat_berat', [AlbertController::class, 'index']);

Route::post('/tambah_alat/post', [AlbertController::class, 'store']);

Route::get('/tambah_alat', [AlbertController::class, 'create']);

Route::get('/edit_alat', [AlbertController::class, 'edit']);

Route::post('/edit_alat/edit', [AlbertController::class, 'update']);