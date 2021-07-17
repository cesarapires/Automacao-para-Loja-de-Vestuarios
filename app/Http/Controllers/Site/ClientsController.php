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

        

        //Verifico se o botão do status foi marcado caso ele não tenha sido eu passo 0 para o banco e também seto null na data
        if( $request->birthdate!=null){
            $dateconvert = implode('-', array_reverse(explode('/', $request->birthdate)));
        }
        else{
            $dateconvert = null;
        }

        DB::table('clients')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'birth_date'=>$dateconvert,
            'cep'=>$request->cep,
            'address'=>$request->address,
            'number'=>$request->number,
            'city'=>$request->city,
            'district'=>$request->district,
            'state'=>$request->state,
            'sex'=>$request->sex,
            'cpf'=>$request->cpf,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")  
        ]);
        return redirect('Clientes');
    }

    public function update(Request $request)
    {

        if( $request->edtbirthdate!=null){
            $dateconvert = implode('-', array_reverse(explode('/', $request->edtbirthdate)));
        }
        else{
            $dateconvert = null;
        }

        DB::table('clients')->
        where('client_id','=',$request->edtid)->
        update([
            'name'=>$request->edtname,
            'email'=>$request->edtemail,
            'phone'=>$request->edtphone,
            'birth_date'=>$dateconvert,
            'cep'=>$request->edtcep,
            'address'=>$request->edtaddress,
            'number'=>$request->edtnumber,
            'city'=>$request->edtcity,
            'district'=>$request->edtdistrict,
            'state'=>$request->edtstate,
            'sex'=>$request->edtsex,
            'cpf'=>$request->edtcpf,
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Clientes');
    }

    public function searchClient($idClient){
        $selectclient = DB::table('clients')
        ->select()
        ->where('client_id','=',$idClient)
        ->get();
        return response()->json($selectclient);
    }

    public function delete(Request $request)
    {

        DB::table('clients')->
        where('client_id','=',$request->delidClient)->
        delete();     
         
        return redirect('Clientes');
    }
}