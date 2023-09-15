<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwitansiController;
use App\Models\Kwitansi;

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
    return view('kwitansi.index',[
        'kwitansis' => Kwitansi::all(),
    ]);
});

Route::get('/kwitansi', [KwitansiController::class, 'index'])->name('kwitansi');
Route::get('/kwitansi/create', [KwitansiController::class, 'create'])->name('kwitansi.create');
Route::post('/kwitansi', [KwitansiController::class, 'store'])->name('kwitansi.store');
Route::get('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'show'])->name('kwitansi.show');
Route::get('/kwitansi/{kwitansi:id}/edit', [KwitansiController::class, 'edit'])->name('kwitansi.edit');
Route::put('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'update'])->name('kwitansi.update');
Route::delete('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'destroy'])->name('kwitansi.destroy');