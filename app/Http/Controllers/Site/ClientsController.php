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
            'balance_due'=> 00.00
        ]);
        return redirect('Clientes');
    }
}