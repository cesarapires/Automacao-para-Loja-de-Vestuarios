<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayableController extends Controller
{
    public function index(){

        $payables = DB::table('payables')->get();
        return view('Site.Contas.ContasPagar.index',['payables' => $payables,]);
    }

    public function store(Request $request){

        $dateconvert = implode('-', array_reverse(explode('/', $request->datePayable)));
        if($request->statusPayable==null){
            $request->statusPayable=0;
            $dateconvert=NULL;
        }
        DB::table('payables')->insert([
            'name'=>$request->namePayable,
            'date_buypayable'=>implode('-', array_reverse(explode('/', $request->buyPayable))),
            'date_duepayable'=>implode('-', array_reverse(explode('/', $request->duePayable))),
            'date_payable'=>$dateconvert,
            'value'=>$request->pricePayable,
            'status'=>$request->statusPayable,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('ContasPagar');
    }

    public function update(Request $request){
        $dateconvert = implode('-', array_reverse(explode('/', $request->edtdatePayable)));
        if($request->edtstatusPayable==null){
            $request->edtstatusPayable=0;
            $dateconvert=NULL;
        }
        DB::table('payables')
        ->where('payables.payable_id','=',$request->edtidPayable)
        ->update([
            'name'=>$request->edtnamePayable,
            'date_buypayable'=>implode('-', array_reverse(explode('/', $request->edtbuyPayable))),
            'date_duepayable'=>implode('-', array_reverse(explode('/', $request->edtduePayable))),
            'date_payable'=>$dateconvert,
            'value'=>$request->edtpricePayable,
            'status'=>$request->edtstatusPayable,
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('ContasPagar');
    }

    public function modalselectpayable($idPayable){
        $selectpayable = DB::table('payables')
        ->select()
        ->where('payable_id','=',$idPayable)
        ->get();
        return response()->json($selectpayable);
    }

    public function delete(Request $request)
    {
        DB::table('payables')->
        where('payables.payable_id','=',$request->delidPayable)->
        delete();
        return redirect('ContasPagar');
    }
}
