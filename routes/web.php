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
    Route::get('/Produtos/ExcelNuvemShop', 'ProductsController@gerar_excel_nuvem_shopp')->middleware(['auth'])->name('Site.Products.GerarExcelNuvemShop');
    Route::post('/Produtos/CadastroProduto', 'ProductsController@storeProduct')->middleware(['auth'])->name('Site.ProductsStore');
    Route::post('/Produtos/AlterarProduto', 'ProductsController@updateProduct')->middleware(['auth'])->name('Site.ProductsUpdate');
    Route::post('/Produtos/DeleteProduto', 'ProductsController@deleteProduct')->middleware(['auth'])->name('Site.ProductsDelete');
    Route::get('/Produtos/Buscar/{idProducts}', 'ProductsController@searchProducts')->middleware(['auth'])->name('Site.ProductsSearch');
    #Aqui estão as rotas relacionadas ao CRUD de tipos
    Route::get('/Produtos/Tipos', 'ProductsController@indexTipos')->middleware(['auth'])->name('Site.ProductsTypes');
    Route::post('/Produtos/CadastroTipo', 'ProductsController@storeType')->middleware(['auth'])->name('Site.TypesStore');
    Route::post('/Produtos/AlterarTipo', 'ProductsController@updateType')->middleware(['auth'])->name('Site.TypesUpdate');
    Route::post('/Produtos/DeleteTipo', 'ProductsController@deleteType')->middleware(['auth'])->name('Site.TypesDelete');
    #Aqui estão as rotas relacionadas ao CRUD de tamanhos
    Route::get('/Produtos/Tamanhos', 'ProductsController@indexTamanhos')->middleware(['auth'])->name('Site.ProductsSizes');
    Route::post('/Produtos/CadastroTamanho', 'ProductsController@storeSize')->middleware(['auth'])->name('Site.SizeStore');
    Route::post('/Produtos/AlterarTamanho', 'ProductsController@updateSize')->middleware(['auth'])->name('Site.SizeUpdate');
    Route::post('/Produtos/DeleteTamanho', 'ProductsController@deleteSize')->middleware(['auth'])->name('Site.SizeDelete');
    #Aqui estão as rotas relacionadas ao CRUD de Clientes
    Route::get('/Clientes', 'ClientsController@index')->middleware(['auth'])->name('Site.Clients');
    Route::post('/Clientes/CadastroClientes', 'ClientsController@store')->middleware(['auth'])->name('Site.ClientsStore');
    Route::post('/Clientes/Alterarlientes', 'ClientsController@update')->middleware(['auth'])->name('Site.ClientsUpdate');
    Route::post('/Clientes/DeleteClientes', 'ClientsController@delete')->middleware(['auth'])->name('Site.ClientsDelete');
    Route::get('/Clientes/Buscar/{idClient}','ClientsController@searchClient')->middleware(['auth'])->name('Site.ClientSearch');
    /*
    |--------------------------------------------------------------------------
    | Web Routes Vendas
    |--------------------------------------------------------------------------
    |
    | Neste trecho você encontra as rotas relacionadas a venda, como abrir e
    | fechar venda, apagar, editar e salvar uma nova. Além também de poder
    | ter acesso ao CRUD de itens da venda onde será salvo todos os itens que
    | foram marcado em alguma veda.
    |
    */
         #Aqui estão as rotas relacionadas ao CRUD de Vendas
        Route::get('/Vendas','SalesController@index')->middleware(['auth'])->name('Site.Sales');
        Route::get('/Vendas/Nova', 'SalesController@detail_sales')->middleware(['auth'])->name('Site.NewSales');
        Route::post('/Vendas/Salvar', 'SalesController@saveSale')->middleware(['auth'])->name('Site.SaveSales');
        Route::get('/Vendas/Editar/{idSale}','SalesController@detail_sales')->middleware(['auth'])->name('Site.EditSales');
        Route::get('/Vendas/Buscar/{idSale}', 'SalesController@searchSale')->middleware(['auth'])->name('Site.SearchSales');
        Route::get('/Vendas/Imprimir/{idSale}', 'SalesController@printSale')->middleware(['auth'])->name('Site.PrintSales');

        Route::post('/Vendas/AdicionarItem', 'SalesController@additensale')->middleware(['auth'])->name('Site.AddIten');
        Route::post('/Vendas/EditarItem', 'SalesController@edtitensale')->middleware(['auth'])->name('Site.EdtIten');
        Route::post('/Vendas/DeletarItem', 'SalesController@delitensale')->middleware(['auth'])->name('Site.DelIten');
        Route::post('/Vendas/Editar/AdicionarItem/{idSale}', 'SalesController@additensaleedt')->middleware(['auth'])->name('Site.AddItenEdt');
        Route::post('/Vendas/Editar/EditarItem/{idSale}', 'SalesController@edtitensaleedt')->middleware(['auth'])->name('Site.EdtItenEdt');
        Route::post('/Vendas/Editar/DeletarItem/{idSale}', 'SalesController@delitensaleedt')->middleware(['auth'])->name('Site.DelItenEdt');

        Route::post('/Vendas/AbrirVenda', 'SalesController@openSale')->middleware(['auth'])->name('Site.OpenSale');
        Route::post('/Vendas/FecharVenda', 'SalesController@closeSale')->middleware(['auth'])->name('Site.CloseSale');
        Route::post('/Vendas/DeletarVenda', 'SalesController@deleteSale')->middleware(['auth'])->name('Site.DeleteSale');

    Route::get('/Contas', 'BillController@index')->middleware(['auth'])->name('Site.Bills');

    #Aqui estão as rotas relacionadas ao CRUD de Contas a Pagar
    Route::get('/ContasPagar', 'PayableController@index')->middleware(['auth'])->name('Site.Payable');
    Route::get('/ContasPagar/Buscar/{idPayable}', 'PayableController@modalselectpayable')->middleware(['auth'])->name('Site.PayableSelectUpdate');
    Route::post('/ContasPagar/Cadastrar', 'PayableController@store')->middleware(['auth'])->name('Site.PayableStore');
    Route::post('/ContasPagar/Editar', 'PayableController@update')->middleware(['auth'])->name('Site.PayableUpdate');
    Route::post('/ContasPagar/Deletar', 'PayableController@delete')->middleware(['auth'])->name('Site.PayableDelete');

    #Aqui estão as rotas relacionadas ao CRUD de Contas a Receber
    Route::get('/ContasReceber', 'ReceivableController@index')->middleware(['auth'])->name('Site.Receivable');
    Route::get('/ContasReceber/Buscar/{idReceivable}', 'ReceivableController@modalselectreceiable')->middleware(['auth'])->name('Site.ReceivableSelectUpdate');
    Route::post('/ContasReceber/Cadastrar', 'ReceivableController@store')->middleware(['auth'])->name('Site.ReceivableStore');
    Route::post('/ContasReceber/Editar', 'ReceivableController@update')->middleware(['auth'])->name('Site.ReceivableUpdate');
    Route::post('/ContasReceber/Deletar', 'ReceivableController@delete')->middleware(['auth'])->name('Site.ReceivableDelete');
    Route::get('/ContasReceber/SomarTotaisCliente/{client_id}', 'ReceivableController@sumReceivable')->middleware(['auth'])->name('Site.SumReceivableClient');

    Route::get('/Caixa', 'CashierController@index')->middleware(['auth'])->name('Site.Cashier');
    Route::get('/Caixa/Buscar/{idCashier}', 'CashierController@modalselectcachiers')->middleware(['auth'])->name('Site.CashierSelectUpdate');
    Route::post('/Caixa/Cadastrar', 'CashierController@store')->middleware(['auth'])->name('Site.CashierStore');
    Route::post('/Caixa/Editar', 'CashierController@update')->middleware(['auth'])->name('Site.CashierUpdate');
    Route::post('/Caixa/Deletar', 'CashierController@delete')->middleware(['auth'])->name('Site.CashierDelete');
    Route::get('/Caixa/Grafico', 'CashierController@chart')->middleware(['auth'])->name('Site.CashierChart');

    Route::get('/Relatorio', 'ReportController@index')->middleware(['auth'])->name('Site.Report');


    Route::get('/Usuario','UserController@index')->middleware(['auth'])->name('Site.User');

    #Aqui estão as rotas relacionadas ao CRUD de Configuração
    Route::get('/Configuracao', 'SettingsController@index')->middleware(['auth'])->name('Site.Setting');

    #Aqui estão as rotas relacionadas ao CRUD de Plataformas
    Route::get('/Configuracao/Plataformas', 'SettingsController@indexPlatform')->middleware(['auth'])->name('Site.Platform');
    Route::post('/Configuracao/CadastroPlataformas', 'SettingsController@storePlatforms')->middleware(['auth'])->name('Site.PlatformStore');
    Route::post('/Configuracao/AlterarPlataformas', 'SettingsController@updatePlatforms')->middleware(['auth'])->name('Site.PlatformUpdate');
    Route::post('/Configuracao/DeletePlataformas', 'SettingsController@deletePlatforms')->middleware(['auth'])->name('Site.PlatformDelete');

    #Aqui estão as rotas relacionadas ao CRUD de Pagamentos
    Route::get('/Configuracao/Pagamento', 'SettingsController@indexPayment')->middleware(['auth'])->name('Site.Payment');
    Route::get('/Configuracao/Pagamento/Buscar/{idPayment}', 'SettingsController@modalselectcpayment')->middleware(['auth'])->name('Site.PaymentSelectUpdate');
    Route::post('/Configuracao/CadastroPagamento', 'SettingsController@storePayments')->middleware(['auth'])->name('Site.PaymentStore');
    Route::post('/Configuracao/AlterarPagamento', 'SettingsController@updatePayments')->middleware(['auth'])->name('Site.PaymentUpdate');
    Route::post('/Configuracao/DeletePagamento', 'SettingsController@deletePayments')->middleware(['auth'])->name('Site.PaymentDelete');

    #Aqui estão as rotas relacionadas ao CRUD de Parcelas
    Route::get('/Configuracao/Parcelas', 'SettingsController@indexPlot')->middleware(['auth'])->name('Site.Plot');
    Route::post('/Configuracao/CadastroParcelas', 'SettingsController@storePlots')->middleware(['auth'])->name('Site.PlotStore');
    Route::post('/Configuracao/AlterarParcelas', 'SettingsController@updatePlots')->middleware(['auth'])->name('Site.PlotUpdate');
    Route::post('/Configuracao/DeleteParcelas', 'SettingsController@deletePlots')->middleware(['auth'])->name('Site.PlotDelete');

    #Aqui estão as rotas relacionadas ao CRUD de Ajustes no Caixa
    Route::get('/Configuracao/AjusteCaixa', 'SettingsController@indexAdjustment')->middleware(['auth'])->name('Site.Adjustment');
    Route::get('/Configuracao/AjusteCaixa/Buscar/{idAdjustment}', 'SettingsController@modalselectcadjustment')->middleware(['auth'])->name('Site.AdjustmentSelectUpdate');
    Route::post('/Configuracao/CadastroAjusteCaixa', 'SettingsController@storeAdjustment')->middleware(['auth'])->name('Site.AdjustmentStore');
    Route::post('/Configuracao/AlterarAjusteCaixa', 'SettingsController@updateAdjustment')->middleware(['auth'])->name('Site.AdjustmentUpdate');
    Route::post('/Configuracao/DeleteAjusteCaixa', 'SettingsController@deleteAdjustment')->middleware(['auth'])->name('Site.AdjustmentDelete');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
