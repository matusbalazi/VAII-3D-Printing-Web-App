<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\GalleryImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/gallery-images', [GalleryImageController::class, 'index'])->name('gallery-images.index');
Route::middleware('auth')->apiResource('/gallery-images', GalleryImageController::class)->except(['index', 'show']);

Route::get('/user', function (Request $request) {
    return Auth()->check();
})->name('api-user');
