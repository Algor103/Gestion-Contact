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
    Route::get('/contact/{id}/modifier', 'modifier');

    // utilisation de la methode 'post'
    Route::post('/contact', 'enregistrement');
    // utilisation de la methode 'patch'
    Route::patch('/contact/{id}', 'update');
    // utilisation de la methode 'delete'
    Route::delete('/contact/{id}', 'supprimer');
});

