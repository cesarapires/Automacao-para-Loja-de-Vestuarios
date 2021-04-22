<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ProductsController;
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

Route::namespace('App\Http\Controllers\Site')->group(function(){
    Route::get('/', HomeController::class)->name('Site.Home');

    Route::get('/Produtos', 'ProductsController@index')->name('Site.Products');
    Route::get('/Produtos/Tipos', 'ProductsController@indexTipos')->name('Site.ProductsTypes');
    Route::get('/Produtos/Tamanhos', 'ProductsController@indexTamanhos')->name('Site.ProductsSizes');

    
});
    

