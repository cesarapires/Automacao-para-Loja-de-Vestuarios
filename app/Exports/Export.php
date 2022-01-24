<?php

namespace App\Exports;

use App\Models\product;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Export implements FromView
{
    public function view(): View
    {
        $products = product::where('stock', '>', 0)->get();
        foreach ($products as $product){
            $name = $product->name;
            if($product->type_id == 1){
                $name = $product->name." ".$product->color;
            }
            //Função de tirar os acentos
            $url = Export::tirarAcentos($name);
            //Remove o " ", "/" e adiciona "-" no lugar
            $url = str_replace(array(" ","/"), "-", $url);
            //Remove o "(", ")" e adiciona "" no lugar
            $url = str_replace(array("(",")"), "", $url);
            //Deixa a String em minusculo
            $url = strtolower($url);
            $product->name = $name;
            $product->url = $url;
            $product->size;
            $product->type;
        }
        return view('Template.Excel.excelProdutosNuvemShop', [
            'products' => $products
        ]);
    }

    public function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
}

