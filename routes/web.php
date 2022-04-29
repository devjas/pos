<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PosOrderingController;

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

Route::get('/', [PosPagesController::class, 'getCategories']);
Route::get('/items', [PosPagesController::class, 'getItems']);
Route::get('/addons-extras', [PosPagesController::class, 'getAddonsExtras']);

Route::resource('category', CategoryController::class);
Route::resource('order', PosOrderingController::class);