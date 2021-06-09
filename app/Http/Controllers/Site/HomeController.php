<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $numberStock = DB::table('products')->sum('stock');
        $stockValue = DB::table('products')->get();
        $stockPrice = 0;
        $payable = DB::table('payables')
        ->where('payables.status','=',0)
        ->sum('value');
        foreach($stockValue as $stockValue){
            $stockPrice = $stockPrice+($stockValue->stock*$stockValue->price_buy);
        }
        return view('Site.Home.index',[
            'numberStock' => $numberStock,
            'stockPrice' => $stockPrice,
            'payable' => $payable,
        ]);
    }
}
