<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [DesignController::class, "homePage"])->name("home-page");
Route::get('/services', [DesignController::class, "servicesPage"])->name("services-page");
Route::view('/gallery', 'gallery')->name("gallery-page");
Route::get('/shop/{product}/edit', [ProductController::class, "edit"])->name('shop.edit');
Route::put('/shop/{product}', [ProductController::class, "update"])->name('shop.update');
Route::delete('/shop/{product}', [ProductController::class, "destroy"])->name('shop.destroy');
// potrebovali sme nabindovat product model
Route::resource('/shop', ProductController::class)->only(['index', 'store']);
Route::resource('/contact', ContactController::class)->only(['index', 'store']);


// AUTH ROUTES FOR LOGIN, REGISTER, LOGOUT
Route::post('/register', [AuthController::class, "register"])->name("auth-register");
Route::post('/login', [AuthController::class, "login"])->name("auth-login");
Route::post('/logout', [AuthController::class, "logout"])->name("auth-logout");

Route::get('/image/{file}', [FileController::class, "showForUrl"])->name('show-image');
