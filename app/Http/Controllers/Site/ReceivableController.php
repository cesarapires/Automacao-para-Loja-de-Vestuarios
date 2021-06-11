<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceivableController extends Controller
{
    public function index(){
        $receivables = DB::table('receivables')
        ->join('clients', 'receivables.client_id', '=', 'clients.client_id')
        ->select('receivables.*','clients.name as nameClient')
        ->get();
        $clients = DB::table('clients')->get();
        return view('Site.Contas.ContasReceber.index',[
            'receivables'=>$receivables,
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
            'date_sale'=>implode('-', array_reverse(explode('/', $request->datesalereceiable))),
            'date_paymentreceivable'=>$dateconvert,
            'date_duereceivable'=>implode('-', array_reverse(explode('/', $request->dateduereceiable))),
            'value'=>$request->valuereceiable,
            'status'=>$request->statusreceiable,
            'numberplot'=>1,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        

        if($request->edtstatusreceivable==1){
            $this->addincashirer();
        }
        return redirect('ContasReceber');
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
        if($request->edtstatusreceivable==1){
            $this->addincashirer();
        }
        else{
            $this->remincashirer();
        }
        return redirect('ContasReceber');
    }

    public function addincashirer(){

    }

    public function remincashirer(){

    }

    public function modalselectreceiable($idReceivable){
        $selectreceivables = DB::table('receivables')
        ->select()
        ->where('receivable_id','=',$idReceivable)
        ->get();
        return response()->json($selectreceivables);
    }

    public function delete(Request $request)
    {
        DB::table('receivables')->
        where('receivable_id','=',$request->delidreceivable)->
        delete();
        return redirect('ContasReceber');
    }
}