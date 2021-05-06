<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = DB::table('clients')->get();
        return view('Site.Clientes.index',['clients'=>$clients]);
        #dd($products, $types, $sizes);
    }

    public function store(Request $request){
        DB::table('clients')->insert([
            'name'=>$request->nameClient,
            'cpf'=>$request->cpfClient,
            'email'=>$request->emailClient,
            'phone'=>$request->phoneClient,
            'birth_date' => $request->birth_DateClient,  
            'city' => $request->cityClient,  
            'sex'=>$request->sexClient,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'balance_due'=> 00.00
        ]);
        return redirect('Clientes');
    }

    public function update(Request $request)
    {
        DB::table('clients')->
        where('client_id','=',$request->edtidClient)->
        update([
            'name'=>$request->edtnameClient,
            'cpf'=>$request->edtcpfClient,
            'email'=>$request->edtemailClient,
            'phone'=>$request->edtphoneClient,
            'birth_date' => $request->edtbirthdateClient,  
            'city' => $request->edtcityClient,  
            'sex'=>$request->edtsexClient, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Clientes');
    }

    public function delete(Request $request)
    {
        DB::table('clients')->
        where('client_id','=',$request->delidClient)->
        delete();
        return redirect('Clientes');
    }
}