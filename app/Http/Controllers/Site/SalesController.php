<?php

namespace App\Http\Controllers\Site;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('Site.Vendas.index');
        #dd($products, $types, $sizes);
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

    public function createNewSale()
    {
        DB::table('sales')->insert([
            'client_id'=>null,
            'platform_id'=>null,
            'platform_rate'=>0,
            'payment_id'=>null,
            'rate_payment'=>0,
            'fixrate_payment'=>0,
            'shipping_id'=>null,
            'shipping'=>0,
            'plot_id'=>null,
            'plot_rate'=>0,
            'sale_price'=>0,
            'discount'=>0,
            'amount'=>0,
            'created_at' => date("Y-m-d H:i:s")
        ]);
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