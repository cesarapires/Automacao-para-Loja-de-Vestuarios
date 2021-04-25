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

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    | 
    | Aqui estão as rotas relacionadas ao produtos desde as rotas dos tamanhos
    | e tipos até as rotas de cadastro.
    |
    */

    Route::get('/Produtos', 'ProductsController@index')->name('Site.Products');
    Route::post('/Produtos/CadastroProduto', 'ProductsController@store')->name('Site.ProductsStore');
    
    Route::get('/Produtos/Tipos', 'ProductsController@indexTipos')->name('Site.ProductsTypes');
    Route::get('/Produtos/Tamanhos', 'ProductsController@indexTamanhos')->name('Site.ProductsSizes');
    
    
});
    

