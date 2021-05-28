<?php

namespace App\Http\Controllers\Site;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = DB::table('sales')
        ->join('clients', 'sales.client_id', '=', 'clients.client_id')
        ->join('payments', 'sales.payment_id', '=', 'payments.payment_id')
        ->select('sales.*','clients.name as nameClient', 'payments.name as namePayment',
        (DB::raw("(SELECT  COUNT(*) FROM saleitens WHERE sale_id = sales.sale_id) as quantityitens")))
        ->where('status','<>','0')
        ->get();
        return view('Site.Vendas.index',[
            'sales' => $sales
        ]);
    }

    public function indexNew()
    {
        
        $products = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.type_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('products.*', 'types.name as type_name', 'sizes.name as size_name')
        ->get();
        $clients = DB::table('clients')->get();
        $plots = DB::table('plots')->get();
        $payments = DB::table('payments')->get();
        $platforms = DB::table('platforms')->get();
        $sales = DB::table('sales')->latest()->first();
        $saleitens = DB::table('saleitens')
        ->join('products', 'saleitens.product_id', '=', 'products.product_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('saleitens.*', 'products.name', 'sizes.name as size')
        ->where('sale_id','=',$sales->sale_id)
        ->get();
        return view('Site.Vendas.newsale',[
            'products' => $products,
            'clients' => $clients,
            'plots' => $plots,
            'payments' => $payments,
            'platforms' => $platforms,
            'sales' => $sales,
            'saleitens' => $saleitens
        ]);
       
    }

    public function openSale(Request $request)
    {
        DB::table('sales')->
        where('sale_id','=',$request->opensaleid)->
        update([
            'status'=>'A',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return redirect('Vendas');
    }

    public function closeSale(Request $request)
    {
        DB::table('sales')->
        where('sale_id','=',$request->closesaleid)->
        update([
            'status'=>'F',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return redirect('Vendas');
    }

    public function deleteSale(Request $request){
        DB::table('saleitens')->
        where('sale_id','=',$request->delesaleid)->
        delete();
        DB::table('sales')->
        where('sale_id','=',$request->delesaleid)->
        delete();
        return redirect('Vendas');
    }

    public function createNewSale()
    {
        DB::table('sales')->insert([
            'client_id'=>null,
            'platform_id'=>null,
            'platform_rate'=>0,
            'payment_id'=>null,
            'payment_rate_fix'=>0,
            'payment_rate_variable'=>0,
            'payment_rate_month'=>0,
            'plot_id'=>null,
            'rate_client_plot'=>0,
            'rate_company_plot'=>0,
            'shipping_id'=>null,
            'price_shipping'=>0,
            'discount'=>0,
            'subtotalitens'=>0,
            'price_sale'=>0,
            'rate_total'=>0,
            'amount'=>0,
            'status'=>0,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function saveSale(Request $request){
        DB::table('sales')->
        where('sale_id','=',$request->idSale)->
        update([
            'client_id'=>$request->idClient,
            'platform_id'=>$request->platforms,
            'platform_rate'=>$request->ratePlatform,
            'payment_id'=>$request->payment,
            'payment_rate_fix'=>$request->ratefixPayment,
            'payment_rate_variable'=>$request->ratevariablePayment,
            'payment_rate_month'=>$request->ratevariablePayment,
            'plot_id'=>$request->plots,
            'rate_client_plot'=>$request->rateClient,
            'rate_company_plot'=>$request->rateCompany,
            'shipping_id'=>$request->shipping,
            'price_shipping'=>$request->shippingValue,
            'discount'=>$request->discountSale,
            'subtotalitens'=>$request->itensTotal,
            'price_sale'=>$request->priceSale,
            'rate_total'=>$request->ratePaymentValue,
            'amount'=>$request->amountSale,
            'status'=>'A',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $this->createNewSale();
        return redirect('Vendas');
    }

    public function additensale(Request $request)
    {
        DB::table('saleitens')->insert([
            'sale_id'=>$request->idSale,
            'product_id'=>$request->idProduct,
            'quantity'=>$request->quantityProduct,
            'price'=>$request->priceProduct,
            'subtotal'=>($request->quantityProduct)*($request->priceProduct),
            'created_at'=>date("Y-m-d H:i:s"), 
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
        return redirect('Vendas/Nova');
    }

    public function edtitensale(Request $request)
    {
            DB::table('saleitens')->
            where('saleitens_id','=',$request->edtidItenSale)->
            update([
                'product_id'=>$request->edtidProduct,
                'quantity'=>$request->edtquantityProduct,
                'price'=>$request->edtpriceProduct,
                'subtotal'=>($request->edtquantityProduct)*($request->edtpriceProduct), 
                'updated_at' => date("Y-m-d H:i:s")  
            ]);        
        return redirect('Vendas/Nova');
    }

    public function delitensale(Request $request)
    {
        DB::table('saleitens')->
        where('saleitens_id','=',$request->delsaleitens_id)->
        delete();
        return redirect('Vendas/Nova');
    }


}