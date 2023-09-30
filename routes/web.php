<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\DashboardController;
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

    $kwitansis = Kwitansi::get();
       
   
       return view('kwitansi.index', [
           'kwitansis' => $kwitansis,
       ]);
   })->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('can:super admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:super admin');


Route::get('/kwitansi', [KwitansiController::class, 'index'])->name('kwitansi')->middleware('can:admin, super admin');
Route::get('/kwitansi/create', [KwitansiController::class, 'create'])->name('kwitansi.create')->middleware('can:admin, super admin');
Route::post('/kwitansi', [KwitansiController::class, 'store'])->name('kwitansi.store')->middleware('auth');
Route::get('/kwitansi/detail/{kwitansi:id}', [KwitansiController::class, 'detail'])->name('kwitansi.detail')->middleware('auth');
Route::get('/kwitansi/{kwitansi:id}/edit', [KwitansiController::class, 'edit'])->name('kwitansi.edit')->middleware('can:super admin');
Route::put('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'update'])->name('kwitansi.update')->middleware('can:super admin');
Route::delete('/kwitansi/{kwitansi:id}', [KwitansiController::class, 'destroy'])->name('kwitansi.destroy')->middleware('can:super admin');
Route::get('/kwitansi/detail/{kwitansi:id}/print', [KwitansiController::class, 'print'])->name('kwitansi.print')->middleware('can:admin, super admin');
Route::get('/kwitansi/export/excel', [KwitansiController::class, 'export_excel'])->middleware('can:admin, super admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/change-password', [ChangePasswordController::class, 'updateMe'])->name('change-password-me');
Route::post('/change-password/{user_id}', [ChangePasswordController::class, 'updateAdmin'])->name('change-password-admin');

Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage.users')->middleware('can:super admin');
Route::get('/manage-users/create', [ManageUsersController::class, 'create'])->name('manage-users.create')->middleware('can:super admin');
Route::post('/manage-users', [ManageUsersController::class, 'store'])->name('manage-users.store')->middleware('can:super admin');
Route::delete('/manage-users/{userId}', [ManageUsersController::class, 'destroy'])->name('manage-users.destroy')->middleware('can:super admin');
Route::get('/manage-users/{userId}/', [ManageUsersController::class, 'addRole'])->name('add.role')->middleware('can:super admin');
Route::post('/manage-users/{userId}/assign-role', [ManageUsersController::class, 'assignRole'])->name('assign.role')->middleware('can:super admin');

Route::get('/user/{userId}/remove-role', [ManageUsersController::class, 'showRemoveRoleForm'])->name('remove.role')->middleware('can:super admin');
Route::post('/user/{userId}/remove-role', [ManageUsersController::class, 'removeRole'])->name('remove.role')->middleware('can:super admin');

