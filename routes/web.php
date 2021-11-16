<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ContactController;

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
Route::get('/shop', [DesignController::class, "shopPage"])->name("shop-page");
Route::get('/services', [DesignController::class, "servicesPage"])->name("services-page");
Route::get('/contact', [DesignController::class, "contactPage"])->name("contact-page");

Route::post('/contact', [ContactController::class, "store"])->name("contact-create");

Route::post('/register', [AuthController::class, "register"])->name("auth-register");
Route::post('/login', [AuthController::class, "login"])->name("auth-login");
Route::post('/home', [AuthController::class, "logout"])->name("auth-logout");
