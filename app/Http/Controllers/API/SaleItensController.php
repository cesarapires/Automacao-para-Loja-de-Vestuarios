<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleItens as SaleItens;
use App\Http\Resource\SaleItens as SaleItensResource;

class SaleItensController extends Controller
{
    public function index()
    {
        return SaleItens::all();
    }

    public function store(Request $request)
    {
        $request['subtotal'] = $request['quantity']*$request['price'];
        $return = SaleItens::create($request->all());

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

    public function show($saleitens_id)
    {
        if(SaleItens::where('saleitens_id','=',$saleitens_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Item não foi encontrado!"];
        }
        else{
            return SaleItens::where('saleitens_id','=',$saleitens_id)->get();
        }
    }

    public function update(Request $request, $sale_id)
    {
        $request['subtotal'] = $request['quantity']*$request['price'];
        if(SaleItens::where('sale_id','=',$sale_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Ops! Não foi encontrado a venda relacionada a esse produto!"];
        }
        else{
            if(SaleItens::where('saleitens_id','=',$request->saleitens_id)->first()===null){
                return ["code"=>403,
                "status"=>"Unauthorized",
                "message"=>"Item não foi encontrado!"];
            }
            else{
                SaleItens::where('saleitens_id','=',$request->saleitens_id)->update($request->all());
                return ["code"=>200,
                "status"=>"Edited",
                "message"=>"Item alterado com sucesso!"];
            }
        }
    }

    public function destroy(Request $request, $sale_id)
    {
        if(SaleItens::where('sale_id','=',$sale_id)->first()===null){
            return ["code"=>403,
            "status"=>"Unauthorized",
            "message"=>"Ops! Não foi encontrado a venda relacionada a esse produto!"];
        }
        else{
            if(SaleItens::where('saleitens_id','=',$request->saleitens_id)->first()===null){
                return ["code"=>403,
                "status"=>"Unauthorized",
                "message"=>"Item não foi encontrado!"];
            }
            else{
                SaleItens::where('saleitens_id','=',$request->saleitens_id)->delete();
                return ["code"=>200,
                "status"=>"Removed",
                "message"=>"Item removido com sucesso!"];
            }
        }
    }

    public function list_sale_itens($sale_id){
        $result['data'] = SaleItens::where('sale_id','=',$sale_id)->get();
        return $result;
    }

}
