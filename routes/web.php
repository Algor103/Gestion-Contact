<?php

use App\Http\Controllers\ContactController;
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

Route::controller(ContactController::class) -> group(function(){

    // utilisation de la methode 'get'
    Route::get('/', 'index');
    Route::get('/contact/create', 'create');
    Route::get('/contact/{id}', 'afficher');
    Route::get('/contact/{id}', 'modifier');

    // utilisation de la methode 'post'
    Route::post('/contact', 'enregistrement');
    Route::post('/contact/{id}', 'update');
    Route::post('/contact/{id}', 'supprimer');
});

