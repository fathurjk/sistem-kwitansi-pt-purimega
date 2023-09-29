<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ManageUsersController;
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
    if (auth()->user()->hasRole('super_admin')) {
        // Jika user adalah super admin, izinkan akses ke semua data
        $kwitansis = Kwitansi::all();
    } else {
        // Jika bukan super admin, batasi akses berdasarkan user_id
        $kwitansis = Kwitansi::where('user_id', auth()->user()->id)->get();
    }
    return view('kwitansi.index', [
        'kwitansis' => $kwitansis,
    ]);
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('can:super admin');

Route::get('/kwitansi', [KwitansiController::class, 'index'])->name('kwitansi')->middleware('auth');
Route::get('/kwitansi/create', [KwitansiController::class, 'create'])->name('kwitansi.create')->middleware('auth');
Route::post('/kwitansi', [KwitansiController::class, 'store'])->name('kwitansi.store')->middleware('auth');
Route::get('/kwitansi/detail/{kwitansi:id}', [KwitansiController::class, 'detail'])->name('kwitansi.detail')->middleware('auth');
Route::get('/kwitansi/{kwitansi:id}/edit', [KwitansiController::class, 'edit'])->name('kwitansi.edit')->middleware('auth');
Route::put('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'update'])->name('kwitansi.update')->middleware('auth');
Route::delete('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'destroy'])->name('kwitansi.destroy')->middleware('auth');
Route::get('/kwitansi/detail/{kwitansi:id}/print', [KwitansiController::class, 'print'])->name('kwitansi.print')->middleware('auth');
Route::get('/kwitansi/export/excel', [KwitansiController::class, 'export_excel'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change-password');

Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage.users')->middleware('can:super admin');

Route::get('/manage-users/{userId}/', [ManageUsersController::class, 'addRole'])->name('add.role');
Route::post('/manage-users/{userId}/assign-role', [ManageUsersController::class, 'assignRole'])->name('assign.role');

Route::get('/user/{userId}/remove-role', [ManageUsersController::class, 'showRemoveRoleForm'])->name('remove.role');
Route::post('/user/{userId}/remove-role', [ManageUsersController::class, 'removeRole'])->name('remove.role');
