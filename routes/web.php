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
    Route::post('/Produtos/CadastroProduto', 'ProductsController@storeProduct')->name('Site.ProductsStore');
    Route::post('/Produtos/AlterarProduto', 'ProductsController@updateProduct')->name('Site.ProductsUpdate');
    Route::post('/Produtos/DeleteProduto', 'ProductsController@deleteProduct')->name('Site.ProductsDelete');
    
    Route::get('/Produtos/Tipos', 'ProductsController@indexTipos')->name('Site.ProductsTypes');
    Route::post('/Produtos/CadastroTipo', 'ProductsController@storeType')->name('Site.TypesStore');
    Route::post('/Produtos/AlterarTipo', 'ProductsController@updateType')->name('Site.TypesUpdate');
    Route::post('/Produtos/DeleteTipo', 'ProductsController@deleteType')->name('Site.TypesDelete');

    Route::get('/Produtos/Tamanhos', 'ProductsController@indexTamanhos')->name('Site.ProductsSizes');
    Route::post('/Produtos/CadastroTamanho', 'ProductsController@storeSize')->name('Site.SizeStore');
    Route::post('/Produtos/AlterarTamanho', 'ProductsController@updateSize')->name('Site.SizeUpdate');
    Route::post('/Produtos/DeleteTamanho', 'ProductsController@deleteSize')->name('Site.SizeDelete');
});
    

