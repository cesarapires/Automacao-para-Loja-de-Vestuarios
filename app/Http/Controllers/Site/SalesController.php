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
        $products = DB::table('products')->get();
        $clients = DB::table('clients')->get();
        $plots = DB::table('plots')->get();
        $payments = DB::table('payments')->get();
        $platforms = DB::table('platforms')->get();
        return view('Site.Vendas.newsale',[
            'products' => $products,
            'clients' => $clients,
            'plots' => $plots,
            'payments' => $payments,
            'platforms' => $platforms
        ]);
        #dd($products, $types, $sizes);
    }

    public function storeSale()
    {
        DB::table('sales')->insert([
            'client_id'=> null,
            'platform_id'=>null,    
            'platform_rate'=>0,
            'payment_id'=>null,
            'plot_id'=>null,
            'plot_rate'=>0,
            'sale_price'=>0,
            'discount'=>0,
            'amount'=>0
        ]);
    }

    public function newsale()
    {

    }
}
