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

        if($request->statusreceiable == 1){
            $idreceivable = DB::table('receivables')->latest()->first();
            $nameClient = DB::table('clients')
            ->select('name')
            ->where('clients.client_id','=',$request->idclient)
            ->get();

            DB::table('cashiers')->insert([
                'receivable_id'=>$idreceivable->receivable_id,
                'description'=>$nameClient[0]->name,
                'date_receivable'=>$dateconvert,
                'value'=>$request->valuereceiable,
                'type'=>'C',
                'created_at' => date("Y-m-d H:i:s"),  
                'updated_at' => date("Y-m-d H:i:s"),  
            ]);  
        }
        return redirect('ContasReceber');
    }

    public function update(Request $request){

        //Primeiramente buscamos os dados antes de fazer a alteração para verificar se ela já foi alterada
        $status = DB::table('receivables')
        ->select('receivables.status')
        ->where('receivables.receivable_id','=',$request->edtidreceivable)
        ->get();

        //Conversão da data para o formato ISO
        $dateconvert = implode('-', array_reverse(explode('/', $request->edtdatepayablereceivable)));

        //Verifico se o botão do status foi marcado caso ele não tenha sido eu passo 0 para o banco e também seto null na data
        if($request->edtstatusreceivable==null){
            $request->edtstatusreceivable=0;
            $dateconvert=NULL;
        }

        //Update na tabela receivables (Contas a receber)
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


        if($status[0]->status <> $request->edtstatusreceivable){
            $nameClient = DB::table('clients')
            ->select('name')
            ->where('clients.client_id','=',$request->edtidclient)
            ->get();

            if($request->edtstatusreceivable == 1){
                DB::table('cashiers')->insert([
                    'receivable_id'=>$request->edtidreceivable,
                    'client_id'=>$request->edtidclient,
                    'description'=>$nameClient[0]->name,
                    'date_receivable'=>$dateconvert,
                    'value'=>$request->edtvaluereceivable,
                    'type'=>'C',
                    'created_at' => date("Y-m-d H:i:s"),  
                    'updated_at' => date("Y-m-d H:i:s"),  
                ]);  
            }
            else{
                DB::table('cashiers')->
                where('cashiers.receivable_id','=',$request->edtidreceivable)->
                delete();
            }
        }
        return redirect('ContasReceber');
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

        DB::table('cashiers')->
        where('cashiers.receivable_id','=',$request->delidreceivable)->
        delete();

        DB::table('receivables')->
        where('receivable_id','=',$request->delidreceivable)->
        delete();
        return redirect('ContasReceber');
    }
}