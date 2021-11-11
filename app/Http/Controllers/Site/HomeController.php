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
        $receivable = DB::table('receivables')
        ->where('receivables.status','=',0)
        ->sum('value');
        $cashierC = DB::table('cashiers')
        ->where('cashiers.type','=','C')
        ->sum('value');
        $cashierD = DB::table('cashiers')
        ->where('cashiers.type','=','D')
        ->sum('value');
        $adjustmentC = DB::table('adjustments')
        ->where('adjustments.type','=','C')
        ->sum('value');
        $adjustmentD = DB::table('adjustments')
        ->where('adjustments.type','=','D')
        ->sum('value');
        $cashier = ($cashierC+$adjustmentC) - ($cashierD+$adjustmentD);
        foreach($stockValue as $stockValue){
            $stockPrice = $stockPrice+($stockValue->stock*$stockValue->price_buy);
        }

        $cashflowD = DB::table('cashiers')
            ->select(DB::raw('SUM(value), MONTH(date_receivable)'))
            ->where('cashiers.type','=','D')
            ->groupBy(DB::raw('MONTH(date_receivable)'))
            ->get();

        $cashflowC = DB::table('cashiers')
            ->select(DB::raw('SUM(value), MONTH(date_receivable)'))
            ->where('cashiers.type','=','C')
            ->groupBy(DB::raw('MONTH(date_receivable)'))
            ->get();

        dd($cashflowD,$cashflowC);

        return view('Site.Home.index',[
            'numberStock' => $numberStock,
            'stockPrice' => $stockPrice,
            'payable' => $payable,
            'receivable' => $receivable,
            'cashier' => $cashier,
        ]);
    }
}
