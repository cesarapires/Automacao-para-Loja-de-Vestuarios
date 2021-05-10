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
        return view('Site.Vendas.newsale',[
            'products' => $products,
            'clients' => $clients
        ]);
        #dd($products, $types, $sizes);
    }
}
