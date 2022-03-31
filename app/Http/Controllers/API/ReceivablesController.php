<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\receivable as Receivables;
use App\Http\Resource\receivable as ReceivablesResource;

class ReceivablesController extends Controller
{
    public function index()
    {
        return Receivables::all();
    }

    public function store(Request $request)
    {

        $return = Receivables::create($request->all());

        if($return){
            return ["code"=>200,
            "status"=>"Created",
            "message"=>"Item adicionado com sucesso!"];
        }
        else {
            return ["code"=>500,
            "status"=>"Unauthorized",
            "message"=>"Não foi possível fazer a adição do item!"];
        }
    }

    public function show($receivable_id)
    {
        if(Receivables::where('receivable_id','=',$receivable_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Promissória não foi encontrada!"];
        }
        else{
            return Receivables::where('receivable_id','=',$receivable_id)->get();
        }
    }

    public function update(Request $request, $receivable_id)
    {
        if(Receivables::where('receivable_id','=',$request->receivable_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Promissória não foi encontrada!"];
        }
        else{
            Receivables::where('receivable_id','=',$request->receivable_id)->update($request->all());
            return ["code"=>200,
            "status"=>"Edited",
            "message"=>"Promissória alterada com sucesso!"];
        }
    }

    public function destroy($receivable_id)
    {
        if(Receivables::where('receivable_id','=',$receivable_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Promissória não foi encontrada!"];
        }
        else{
            Receivables::where('receivable_id','=',$receivable_id)->delete();
            return ["code"=>200,
            "status"=>"Removed",
            "message"=>"Promissória removida com sucesso!"];
        }
    }

    public function list_sale_itens($sale_id){
        $result['data'] = Receivables::where('sale_id','=',$sale_id)->get();
        return $result;
    }

}
