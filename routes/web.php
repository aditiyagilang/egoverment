<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JabatanController;
use Illuminate\Support\Facades\Route;

Route::get('/generate-pdf', [SktmController::class, 'index']);

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [UsersController::class, 'showLoginForm']);
Route::post('/login', [UsersController::class, 'login'])->name('login');

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::post('/useradd', [UsersController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

Route::get('/index', function () {
    return view('index');
});
Route::get('/suratmasuk', function () {
    return view('suratmasuk');
});
Route::get('/suratkeluar', function () {
    return view('suratkeluar');
});
Route::get('/suratdisposisi', function () {
    return view('suratdisposisi');
});
Route::get('/profile', function () {
    return view('profile');
});
