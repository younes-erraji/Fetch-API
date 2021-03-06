<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\XHRController;

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

Route::view('index', 'index');
Route::view('/', 'fetch');

Route::get('fetch', [FetchController::class, 'index'])->name('fetch');
Route::get('fetch-cities-without-params', [FetchController::class, 'cities'])->name('fetch-cities-without-params');
Route::post('fetch-cities-with-params', [FetchController::class, 'cities_with_params'])->name('fetch-cities-with-params');

Route::get('fetch-cities-with-params-get', [FetchController::class, 'get_cities'])->name('fetch-cities-with-params-get');

Route::get('xhr', [XHRController::class, 'index'])->name('xhr');
Route::get('xhr-cities-without-params', [XHRController::class, 'cities'])->name('xhr-cities-without-params');
Route::post('xhr-cities-with-params', [XHRController::class, 'cities_with_params'])->name('xhr-cities-with-params');

Route::get('xhr-cities-with-params-get', [XHRController::class, 'get_cities'])->name('xhr-cities-with-params-get');
