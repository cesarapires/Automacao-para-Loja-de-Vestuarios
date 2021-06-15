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

       

        if($request->statusPayable == 1){
            $idpayables = DB::table('payables')->latest()->first();

            DB::table('cashiers')->insert([
                'payable_id'=>$idpayables->payable_id,
                'description'=>$request->namePayable,
                'date_receivable'=>$dateconvert,
                'value'=>$request->pricePayable,
                'type'=>'D',
                'created_at' => date("Y-m-d H:i:s"),  
                'updated_at' => date("Y-m-d H:i:s"),  
            ]);  
        }

        return redirect('ContasPagar');
    }

    public function update(Request $request){
        $status = DB::table('payables')
        ->select('payables.status')
        ->where('payables.payable_id','=',$request->edtidPayable)
        ->get();

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

        if($status[0]->status <> $request->edtstatusPayable){
            if($request->edtstatusPayable == 1){
                DB::table('cashiers')->insert([
                    'payable_id'=>$request->edtidPayable,
                    'description'=>$request->edtnamePayable,
                    'date_receivable'=>$dateconvert,
                    'value'=>$request->edtpricePayable,
                    'type'=>'D',
                    'created_at' => date("Y-m-d H:i:s"),  
                    'updated_at' => date("Y-m-d H:i:s"),  
                ]);  
            }
            else{
                DB::table('cashiers')->
                where('cashiers.payable_id','=',$request->edtidPayable)->
                delete();
            }
        }

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

        DB::table('cashiers')->
        where('cashiers.payable_id','=',$request->delidPayable)->
        delete();

        DB::table('payables')->
        where('payables.payable_id','=',$request->delidPayable)->
        delete();

        return redirect('ContasPagar');
    }

    public function addincashirer(){

    }

    public function remincashirer(){

    }
}