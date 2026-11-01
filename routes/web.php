<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/register', function () {
//     return view('register');
// });


//Login
Route::get('/',[AuthController::class,'login'])->name('loginview');
Route::post('/postlogin',[AuthController::class,'postlogin'])->name('postloginview');

//Register
Route::get('/register',[AuthController::class,'register'])->name('registerview');
Route::post('/postregister',[AuthController::class,'postregister'])->name('postregisterview');

//
Route::get('/admin',[AuthController::class,'admin'])->name('adminview');
Route::get('/menu',[AuthController::class,'menu'])->name('menuview');

