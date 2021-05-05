<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ProductsController;
use App\Http\Controller\UserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::namespace('App\Http\Controllers\Site')->group(function(){
    Route::get('/', HomeController::class)->middleware(['auth'])->name('Site.Home');

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    | 
    | Aqui estão as rotas relacionadas ao produtos desde as rotas dos tamanhos
    | e tipos até as rotas de cadastro.
    |
    */
    #Aqui estão as rotas relacionadas ao CRUD de produtos, todos com as devidas autenticação de usuário
    Route::get('/Produtos', 'ProductsController@index')->middleware(['auth'])->name('Site.Products');
    Route::post('/Produtos/CadastroProduto', 'ProductsController@storeProduct')->middleware(['auth'])->name('Site.ProductsStore');
    Route::post('/Produtos/AlterarProduto', 'ProductsController@updateProduct')->middleware(['auth'])->name('Site.ProductsUpdate');
    Route::post('/Produtos/DeleteProduto', 'ProductsController@deleteProduct')->middleware(['auth'])->name('Site.ProductsDelete');
    #Aqui estão as rotas relacionadas ao CRUD de tipos
    Route::get('/Produtos/Tipos', 'ProductsController@indexTipos')->middleware(['auth'])->name('Site.ProductsTypes');
    Route::post('/Produtos/CadastroTipo', 'ProductsController@storeType')->middleware(['auth'])->name('Site.TypesStore');
    Route::post('/Produtos/AlterarTipo', 'ProductsController@updateType')->middleware(['auth'])->name('Site.TypesUpdate');
    Route::post('/Produtos/DeleteTipo', 'ProductsController@deleteType')->middleware(['auth'])->name('Site.TypesDelete');
    #Aqui estão as rolas relacionadas ao CRUD de tamanhos
    Route::get('/Produtos/Tamanhos', 'ProductsController@indexTamanhos')->middleware(['auth'])->name('Site.ProductsSizes');
    Route::post('/Produtos/CadastroTamanho', 'ProductsController@storeSize')->middleware(['auth'])->name('Site.SizeStore');
    Route::post('/Produtos/AlterarTamanho', 'ProductsController@updateSize')->middleware(['auth'])->name('Site.SizeUpdate');
    Route::post('/Produtos/DeleteTamanho', 'ProductsController@deleteSize')->middleware(['auth'])->name('Site.SizeDelete');

    Route::get('/Clientes', 'ClientsController@index')->middleware(['auth'])->name('Site.Clients');
    Route::post('/Clientes/CadastroClientes', 'ClientsController@store')->middleware(['auth'])->name('Site.ClientsStore');
  

    Route::get('/Vendas','SalesController@index')->middleware(['auth'])->name('Site.Sales');


    Route::get('/Contas', 'BillController@index')->middleware(['auth'])->name('Site.Bills');


    Route::get('/Caixa', 'CashierController@index')->middleware(['auth'])->name('Site.Cashier');


    Route::get('/Relatorio', 'ReportController@index')->middleware(['auth'])->name('Site.Report');


    Route::get('/Usuario','UserController@index')->middleware(['auth'])->name('Site.User');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';