<?php

use App\Http\Controllers\AlbumController;
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
    return view('welcome');
});

Route::controller(AlbumController::class)->group(function () {
    Route::get('/discografia', 'Index');
    Route::get('/discografia/criar', 'Create');
    Route::post('/discografia/criar', 'Store');
    Route::get('/discografia/editar/{id}', 'Edit');
    Route::post('/discografia/editar/{id}', 'Update');
    Route::get('/discografia/apagar/{id}', 'Delete');
});

Route::controller(TrackController::class)->group(function () {
    Route::get('/faixa/criar', 'Create');
    Route::post('/faixa/criar', 'Store');
    Route::get('/faixa/editar/{id}', 'Edit');
    Route::post('/faixa/editar/{id}', 'Update');
    Route::get('/faixa/apagar/{id}', 'Delete');
});