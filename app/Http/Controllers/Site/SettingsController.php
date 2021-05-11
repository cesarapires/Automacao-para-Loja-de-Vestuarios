<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('Site.Configuracao.index');
    }

    public function indexPlatform(){
        return view('Site.Configuracao.Plataformas.index');
    }

    public function indexPlot(){
        return view('Site.Configuracao.Parcelas.index');
    }

    public function indexPayment(){
        return view('Site.Configuracao.Pagamentos.index');
    }

    public function storePlots(Request $request){
        DB::table('plots')->insert([
            'name'=>$request->namePlot,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Produtos/Tipos');
    }

    public function updatePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->edtidPlot)->
        update([
            'name'=>$request->edtnamePlot, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Produtos/Tamanhos');
    }

    public function deletePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->delidPlot)->
        delete();
        return redirect('Produtos');
    }


    public function storePayments(Request $request){
        DB::table('payments')->insert([
            'name'=>$request->namePayment,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Produtos/Tipos');
    }

    public function updatePayments(Request $request){
        DB::table('payments')->
        where('payment_id','=',$request->edtidPayment)->
        update([
            'name'=>$request->edtnamePayment, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Produtos/Tamanhos');
    }

    public function deletePayments(Request $request){
        DB::table('payments')->
        where('payment_id','=',$request->delidPayment)->
        delete();
        return redirect('Produtos');
    }


    public function storePlatforms(Request $request){
        DB::table('platforms')->insert([
            'name'=>$request->namePlatform,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Produtos/Tipos');
    }

    public function updatePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->edtidPlatform)->
        update([
            'name'=>$request->edtnamePlatform, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Produtos/Tamanhos');
    }

    public function deletePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->delidPlatform)->
        delete();
        return redirect('Produtos');
    }
}
