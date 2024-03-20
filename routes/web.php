<?php

use App\Http\Controllers\SktmController;
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

Route::get('/', function () {
    return view('login');
});
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
