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
        $dateconvert = implode('-', array_reverse(explode('/', $request->edtdatepayablereceivable)));
        if($request->edtstatusreceivable==null){
            $request->edtstatusreceivable=0;
            $dateconvert=NULL;
        }
        DB::table('receivables')
        ->where('receivables.receivable_id','=',$request->edtidreceivable)
        ->update([
            'client_id'=>$request->edtidclient,
            'date_sale'=>implode('-', array_reverse(explode('/', $request->edtdatesalereceivable))),
            'date_paymentreceivable'=>$dateconvert,
            'date_duereceivable'=>implode('-', array_reverse(explode('/', $request->edtdateduereceivable))),
            'value'=>$request->edtvaluereceivable,
            'status'=>$request->edtstatusreceivable,
            'updated_at' => date("Y-m-d H:i:s"),    
        ]);        

        return redirect('ContasReceber');
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
}
