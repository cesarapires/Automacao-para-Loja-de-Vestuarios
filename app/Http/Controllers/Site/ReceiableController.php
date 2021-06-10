<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiableController extends Controller
{
    public function index(){
        $clients = DB::table('clients')->get();
        return view('Site.Contas.ContasReceber.index',[
            'clients' => $clients
        ]);
    }

    public function store(Request $request){

        $dateconvert = implode('-', array_reverse(explode('/', $request->datepayablereceible)));
        if($request->statusreceiable==null){
            $request->statusreceiable=0;
            $dateconvert=NULL;
        }
        DB::table('receivables')->insert([
            'client_id'=>$request->idclient,
            'date_sell'=>implode('-', array_reverse(explode('/', $request->datesalereceiable))),
            'date_paymentReceivable'=>$dateconvert,
            'dateDueReceivable'=>implode('-', array_reverse(explode('/', $request->dateduereceiable))),
            'value'=>$request->valuereceiable,
            'status'=>$request->statusreceiable,
            'plot_id'=>1,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('ContasReceber');
    }

    public function update(Request $request){
        $dateconvert = implode('-', array_reverse(explode('/', $request->edtdatepayablereceible)));
        if($request->edtstatusreceiable==null){
            $request->edtstatusreceiable=0;
            $dateconvert=NULL;
        }
        DB::table('receivables')
        ->where('receivables.receiable_id','=',$request->edtstatusreceiable)
        ->update([
            'client_id '=>$request->edtidclient,
            'date_sell'=>implode('-', array_reverse(explode('/', $request->edtdatesalereceiable))),
            'date_paymentReceivable'=>$dateconvert,
            'dateDueReceivable'=>implode('-', array_reverse(explode('/', $request->edtdateduereceiable))),
            'value'=>$request->edtvaluereceiable,
            'status'=>$request->edtstatusreceiable,
            'updated_at' => date("Y-m-d H:i:s"),    
        ]);        
        return redirect('ContasReceber');
    }

    public function modalselectreceiable($idReceiable){
        $selectreceiable = DB::table('receivables')
        ->select()
        ->where('receiable_id','=',$idReceiable)
        ->get();
        return response()->json($selectreceiable);
    }
}