<?php

use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SuratMasukController;
use App\Models\Disposisi;
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



Route::get('/suratmasukumum', [SuratMasukController::class, 'index'])->name('surat.index');
Route::post('/suratmasuks', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
Route::put('/suratmasuk/{id}', [SuratMasukController::class, 'update'])->name('suratmasuk.update');
Route::delete('/suratmasuk/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.destroy');


Route::post('/adddisposisi/{id}', [DisposisiController::class, 'store'])->name('disposisi.store');
Route::post('/aksesdisposisi/{id}', [DisposisiController::class, 'disposisi'])->name('disposisi.akses');
Route::get('/disposisiakses-data', [DisposisiController::class, 'getData'])->name('disposisi.index');
Route::delete('/disposisi/{id}', [DisposisiController::class, 'destroy'])->name('disposisi.destroy');
Route::get('/view-pdf/{fileName}', [PdfController::class, 'viewPdf'])->name('view-pdf');


Route::get('/profile', [UsersController::class, 'showprofil'])->name('user.profil');
Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::post('/useradd', [UsersController::class, 'store'])->name('user.store');
Route::get('/logout', [UsersController::class, 'logout'])->name('user.logout');
Route::put('/profile/{id}', [UsersController::class, 'updateprofile'])->name('profile.update');

Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

Route::get('/dashboardadmin', [HomeController::class, 'index'])->name('dashboard.admin');
Route::get('/dashboardumum', [HomeController::class, 'indexumum'])->name('dashboard.umum');

Route::get('/index', function () {
    return view('index');
});

Route::get('/suratkeluar', function () {
    return view('suratkeluar');
});

//
