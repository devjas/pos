<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PosOrderingController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\ItemsAddonsController;
use App\Http\Controllers\TestController;

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
Route::get('/items/{category_id}', [PosPagesController::class, 'getItems']);
Route::get('/addons-extras/{item_id}', [PosPagesController::class, 'getAddonsExtras'])->name('addons.extras');

Route::resources([
	'category' => CategoryController::class,
	'item' => ItemController::class,
	'addon' => AddonController::class,
	'order' => PosOrderingController::class,
	'item-addon' => ItemsAddonsController::class
]);

Route::get('test', [TestController::class, 'test']);