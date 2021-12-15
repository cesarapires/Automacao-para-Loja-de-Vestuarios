<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index()
    {
        $cashiers = DB::table('cashiers')->get();
        return view('Site.Caixa.index',['cashiers'=>$cashiers]);
    }

    public function store(Request $request){
        DB::table('cashiers')->insert([
            'description'=>$request->description,
            'date_receivable'=>implode('-', array_reverse(explode('/', $request->dateCashier))),
            'value'=>$request->valueCashier,
            'type'=>$request->typeCashier,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        

        if($request->edtstatusreceivable==1){
            $this->addincashirer();
        }
        return redirect('Caixa');
    }


    public function update(Request $request){
        DB::table('cashiers')
        ->where('cashiers.cashier_id','=',$request->edtidCashier)
        ->update([
            'description'=>$request->edtdescription,
            'date_receivable'=>implode('-', array_reverse(explode('/', $request->edtdateCashier))),
            'value'=>$request->edtvalueCashier,
            'type'=>$request->edttypeCashier, 
            'updated_at' => date("Y-m-d H:i:s"),
        ]);        
        return redirect('Caixa');
    }

    public function delete(Request $request)
    {
        DB::table('cashiers')->
        where('cashiers.cashier_id','=',$request->delidCashier)->
        delete();
        return redirect('Caixa');
    }

    public function modalselectcachiers($idCashier){
        $selectCashier = DB::table('cashiers')
        ->select()
        ->where('cashier_id','=',$idCashier)
        ->get();
        return response()->json($selectCashier);
    }

    public function chart(){
        $cashD = DB::table('cashiers')
        ->select(DB::raw('SUM(value) as value, MONTH(date_receivable) as month'))
        ->where('cashiers.type','=','D')
        ->groupBy(DB::raw('MONTH(date_receivable)'))
        ->get();

        $cashC = DB::table('cashiers')
        ->select(DB::raw('SUM(value) as value, MONTH(date_receivable) as month'))
        ->where('cashiers.type','=','C')
        ->groupBy(DB::raw('MONTH(date_receivable)'))
        ->get();

    $cashflowD = collect();
    $cashflowC = collect();

    
    foreach($cashD as $cashD){
        $cashflowD[$cashD->month] = $cashD->value;
    }

    foreach($cashC as $cashC){
        $cashflowC[$cashC->month] = $cashC->value;
    }

    return response()->json(array(
        'credit' => $cashflowC,
        'debit' => $cashflowD,
    ));

    }
}
