<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index(){
        $numberPlatform = DB::table('platforms')->count();
        $numberPlot = DB::table('plots')->count();
        $numberPayment = DB::table('payments')->count();

        return view('Site.Configuracao.index',[
            'numberPlatform' => $numberPlatform,
            'numberPlot'=> $numberPlot,
            'numberPayment' => $numberPayment
        ]);
    }

    public function indexPlatform(){
        $platform = DB::table('platforms')->get();
        return view('Site.Configuracao.Plataformas.index',[
            'platform' => $platform,
        ]);
    }

    public function indexPlot(){
        $plot = DB::table('plots')->get();
        return view('Site.Configuracao.Parcelas.index',[
            'plot' => $plot,
        ]);
    }

    public function indexPayment(){
        $payment = DB::table('payments')->get();
        $plots = DB::table('plots')->get();
        return view('Site.Configuracao.Pagamentos.index',[
            'plots' => $plots,
            'payment' => $payment,
        ]);
    }

    public function storePlots(Request $request){
        DB::table('plots')->insert([
            'name'=>$request->namePlot,
            'number'=>$request->numberPlot,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Parcelas');
    }

    public function updatePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->edtidPlot)->
        update([
            'name'=>$request->edtnamePlot, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Parcelas');
    }

    public function deletePlots(Request $request){
        DB::table('plots')->
        where('plot_id','=',$request->delidPlot)->
        delete();
        return redirect('Configuracao/Parcelas');
    }


    public function storePayments(Request $request){
        if($request->credit == null){
            $request->credit = 0;
        }
        if($request->ratetypePayment == null){
            $request->ratetypePayment = 0;
        }
        if($request->exemptionPayment == null){
            $request->exemptionPayment = 0;
        }
        if($request->idplots == null){
            $request->idplots = 0;
        }
        DB::table('payments')->insert([
            'name'=>$request->namePayment,
            'payment_rate'=>$request->ratePayment,
            'payment_fixrate'=>$request->fixratePayment,
            'payment_ratevariable'=>$request->ratemonthPayment,
            'payment_ratetype'=>$request->ratetypePayment,
            'credit'=>$request->credit,
            'plot_id'=>$request->idplots,
            'exemption'=>$request->exemptionPayment,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Pagamento');
    }

    public function updatePayments(Request $request){
        if($request->edtcredit == null){
            $request->edtcredit = 0;
        }
        if($request->edtratetypePayment == null){
            $request->edtratetypePayment = 0;
        }
        DB::table('payments')->
        where('payment_id','=',$request->edtidPayment)->
        update([
            'name'=>$request->edtnamePayment, 
            'payment_rate'=>$request->edtratePayment,
            'payment_fixrate'=>$request->edtfixratePayment,
            'payment_ratevariable'=>$request->edtratemonthPayment,
            'payment_ratetype'=>$request->edtratetypePayment,
            'credit'=>$request->edtcredit,
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Pagamento');
    }

    public function deletePayments(Request $request){
        DB::table('payments')->
        where('payment_id','=',$request->delidPayment)->
        delete();
        return redirect('Configuracao/Pagamento');
    }


    public function storePlatforms(Request $request){
        DB::table('platforms')->insert([
            'name'=>$request->namePlatform,
            'platform_rate'=>$request->ratePlatform,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Configuracao/Plataformas');
    }

    public function updatePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->edtidPlatform)->
        update([
            'name'=>$request->edtnamePlatform, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Configuracao/Plataformas');
    }

    public function deletePlatforms(Request $request){
        DB::table('platforms')->
        where('platform_id','=',$request->delidPlatform)->
        delete();
        return redirect('Configuracao/Plataformas');
    }
}
