<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', "App\Http\Controllers\HomeController@index")->name('home');
Route::get('/admin', "App\Http\Controllers\HomeController@admin")->name('admin');
Route::get('/livres', "App\Http\Controllers\HomeController@livres")->name('livres');
Route::post('/livres', "App\Http\Controllers\HomeController@storeLivre")->name('storeLivre');
Route::post('/toggle/{id}', "App\Http\Controllers\HomeController@toggle")->name('toggle');
Route::post('/deleteCategorie/{id}', "App\Http\Controllers\HomeController@deleteCategorie")->name('deleteCategorie');
Route::post('/createCategorie', "App\Http\Controllers\HomeController@createCategorie")->name('createCategorie');
Route::get('/categories', "App\Http\Controllers\HomeController@categories")->name('categories');
Route::get('/stats', "App\Http\Controllers\HomeController@stats")->name('stats');
Route::get('/searchEmprunt', "App\Http\Controllers\HomeController@searchEmpruntByDate")->name('searchEmprunt');
Route::get('/search', "App\Http\Controllers\HomeController@searchByAuthor")->name('searchByAuthor');
