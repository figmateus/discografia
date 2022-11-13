<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
use Illuminate\Routing\RouteGroup;
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
    return redirect('/discografia');
});

Route::controller(AlbumController::class)->group(function () {
    Route::get('/discografia', 'index')->name('discografia');
    Route::get('/discografia/search', 'search')->name('search');
    Route::get('/discografia/criar', 'create');
    Route::post('/discografia/criar', 'store');
    Route::get('/discografia/{id}', 'show')->name('album.show');
    Route::get('/discografia/apagar/{id}', 'delete');
});

Route::controller(TrackController::class)->group(function () {
    Route::get('/faixa/criar', 'create');
    Route::post('/faixa/criar', 'store');
    Route::get('/faixa/apagar/{id}', 'delete');
});
