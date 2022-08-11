<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
});

Route::get('register', function () {
    return view('register');
});

Route::get('registerbiodata', function () {
    return view('registerbiodata');
});



Route::get('/', [SignupController::class, 'login'])->name('login');
Route::post('actionlogin', [SignupController::class, 'login_user'])->name('login_user');
Route::post('createuser', [SignupController::class, 'create_user'])->name('create_user');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [SignupController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('updatebiodata/{id}', [RegisterController::class, 'filledField'])->name('filledField')->middleware('auth');
Route::get('updated/{id}', [RegisterController::class, 'update'])->name('update')->middleware('auth');
Route::get('deleted/{id}', [RegisterController::class, 'delete'])->name('delete')->middleware('auth');




Route::post('createbiodata', [RegisterController::class, 'register_biodata'])->name('registerbiodata')->middleware('auth');
Route::get('tampilandata', [RegisterController::class, 'tampilanbiodata'])->name('tampilanbiodata')->middleware('auth');
Route::get('santri/tambah', [SantriController::class, 'tambahsantri'])->name('tambahsantri')->middleware('auth');
Route::post('santri/simpan', [SantriController::class, 'simpansantri'])->name('simpansantri')->middleware('auth');

