<?php

namespace App\Http\Controllers\Site;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = DB::table('sales')
        ->join('clients', 'sales.client_id', '=', 'clients.client_id')
        ->join('payments', 'sales.payment_id', '=', 'payments.payment_id')
        ->select('sales.*','clients.name as nameClient', 'payments.name as namePayment',
        (DB::raw("(SELECT  COUNT(*) FROM saleitens WHERE sale_id = sales.sale_id) as quantityitens")))
        ->where('status','<>','0')
        ->get();
        return view('Site.Vendas.index',[
            'sales' => $sales,
        ]);
    }

    public function detail_sales($sale_id = null)
    {

        $products = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.type_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('products.*', 'types.name as type_name', 'sizes.name as size_name')
        ->where('stock','>',0)
        ->get();
        $clients = DB::table('clients')->get();
        $plots = DB::table('plots')->get();
        $payments = DB::table('payments')->get();
        $platforms = DB::table('platforms')->get();
        if($sale_id == null){
            $sales = DB::table('sales')->select('*')->latest()->first();
        }
        else{
            $sales = DB::table('sales')->select('*')->where('sale_id','=',$sale_id)->first();
        }
        $saleitens = DB::table('saleitens')
        ->join('products', 'saleitens.product_id', '=', 'products.product_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('saleitens.*', 'products.name', 'sizes.name as size')
        ->where('sale_id','=',$sales->sale_id)
        ->get();
        return view('Site.Vendas.sale',[
            'products' => $products,
            'clients' => $clients,
            'plots' => $plots,
            'payments' => $payments,
            'platforms' => $platforms,
            'sales' => $sales,
            'saleitens' => $saleitens
        ]);

    }

    public function searchSale($idSale){
        $products = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.type_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('products.*', 'types.name as type_name', 'sizes.name as size_name')
        ->get();
        $plots = DB::table('plots')->get();
        $payments = DB::table('payments')->get();
        $platforms = DB::table('platforms')->get();

        $sales['InfoVenda'] = DB::table('sales')
        ->join('clients','sales.client_id','=','clients.client_id')
        ->join('payments', 'sales.payment_id','=','payments.payment_id')
        ->join('plots', 'sales.plot_id','=','plots.plot_id')
        ->select('sales.*','clients.*','payments.name as payment' , 'plots.name as plot')
        ->where('sales.sale_id','=',$idSale)
        ->get();

        $sales['Produtos'] = DB::table('saleitens')
        ->join('products', 'saleitens.product_id', '=', 'products.product_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('saleitens.*', 'products.name', 'sizes.name as size')
        ->where('sale_id','=',$idSale)
        ->get();
        //$exit = array_merge($sales[1],$saleitens);
        return response()->json($sales);
    }

    public function openSale(Request $request)
    {
        DB::table('sales')->
        where('sale_id','=',$request->opensaleid)->
        update([
            'status'=>'A',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        $saleitens = DB::table('saleitens')
        ->select()
        ->where('saleitens.sale_id', '=', $request->opensaleid)
        ->get();
        foreach ($saleitens as $saleitens){
            $products = DB::table('products')
            ->select('*')
            ->where('products.product_id', '=', $saleitens->product_id)
            ->get();
            $newStock = $products[0]->stock + $saleitens->quantity;
            DB::table('products')->
            where('product_id','=',$saleitens->product_id)->
            update([
                'stock'=> $newStock

            ]);
        }

        $receivableID = DB::table('receivables')->select()->where('sale_id','=',$request->opensaleid)->get();

        foreach($receivableID as $receivableID){
            DB::table('cashiers')->
            where('cashiers.receivable_id','=',$receivableID->receivable_id)->
            delete();
        }
        DB::table('cashiers')->
        where('sale_id','=',$request->opensaleid)->
        delete();
        DB::table('receivables')->
        where('sale_id','=',$request->opensaleid)->
        delete();
        return redirect('Vendas');
    }

    public function closeSale(Request $request)
    {
        $sale = DB::table('sales')->select()->where('sales.sale_id','=',$request->closesaleid)->get();

        $plot = DB::table('plots')->select('number')->where('plots.plot_id','=',$sale[0]->plot_id)->get();

        $payment =DB::table('payments')->select('*')->where('payments.payment_id','=',$sale[0]->payment_id)->get();

        if($payment[0]->exemption == 1){
            $days=30;
            $date = date("Y-m-d", strtotime($sale[0]->date_sale.'+'.$days.'days'));
            DB::table('receivables')->insert([
                'client_id'=>$sale[0]->client_id,
                'sale_id'=>$sale[0]->sale_id,
                'payment_id'=>$sale[0]->payment_id,
                'date_sale'=>$sale[0]->date_sale,
                'date_duereceivable'=>$date,
                'value'=>$sale[0]->amount,
                'status'=>0,
                'numberplot'=>1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
        else{
            if($payment[0]->credit == 1){
                if($plot[0]->number ==0){
                    $days=1;
                    $date = date("Y-m-d", strtotime($sale[0]->date_sale.'+'.$days.'days'));
                    DB::table('receivables')->insert([
                        'client_id'=>$sale[0]->client_id,
                        'sale_id'=>$sale[0]->sale_id,
                        'payment_id'=>$sale[0]->payment_id,
                        'date_sale'=>$sale[0]->date_sale,
                        'date_duereceivable'=>$date,
                        'value'=>$sale[0]->amount,
                        'status'=>0,
                        'numberplot'=>1,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]);
                }else{
                    $valuePlot = $sale[0]->amount/$plot[0]->number;
                    for($cont = 1; $cont<=$plot[0]->number;$cont++){
                        $days = $cont*30;

                        DB::table('receivables')->insert([
                            'client_id'=>$sale[0]->client_id,
                            'sale_id'=>$sale[0]->sale_id,
                            'payment_id'=>$sale[0]->payment_id,
                            'date_sale'=>$sale[0]->date_sale,
                            'date_duereceivable'=>date("Y-m-d", strtotime($sale[0]->date_sale.'+'.$days.'days')),
                            'value'=>$valuePlot,
                            'status'=>0,
                            'numberplot'=>$cont,
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s"),
                        ]);
                    }
                }
            }
            else{
                $nameClient = DB::table('clients')
                ->select('name')
                ->where('clients.client_id','=',$sale[0]->client_id)
                ->get();

                DB::table('cashiers')->insert([
                    'description'=>$nameClient[0]->name,
                    'client_id'=>$sale[0]->client_id,
                    'sale_id'=>$sale[0]->sale_id,
                    'payment_id'=>$sale[0]->payment_id,
                    'date_receivable'=>$sale[0]->date_sale,
                    'value'=>$sale[0]->amount,
                    'type'=>'C',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                    'sale_id'=>$sale[0]->sale_id,
                ]);
            }
        }
        $saleitens = DB::table('saleitens')
        ->select()
        ->where('saleitens.sale_id', '=', $request->closesaleid)
        ->get();

        foreach ($saleitens as $saleitens){
            $products = DB::table('products')
            ->select('*')
            ->where('products.product_id', '=', $saleitens->product_id)
            ->get();
            $newStock = $products[0]->stock - $saleitens->quantity;
            DB::table('products')->
            where('product_id','=',$saleitens->product_id)->
            update([
                'stock'=> $newStock
            ]);
        }

        DB::table('sales')->
        where('sale_id','=',$request->closesaleid)->
        update([
            'status'=>'F',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        return redirect('Vendas');
    }

    public function deleteSale(Request $request){
        DB::table('saleitens')->
        where('sale_id','=',$request->delesaleid)->
        delete();
        DB::table('sales')->
        where('sale_id','=',$request->delesaleid)->
        delete();
        return redirect('Vendas');
    }

    public function createNewSale()
    {
        DB::table('sales')->insert([
            'date_sale'=>null,
            'client_id'=>null,
            'platform_id'=>null,
            'platform_rate'=>0,
            'payment_id'=>null,
            'payment_rate_fix'=>0,
            'payment_rate_variable'=>0,
            'payment_rate_month'=>0,
            'plot_id'=>null,
            'rate_client_plot'=>0,
            'rate_company_plot'=>0,
            'shipping_id'=>null,
            'price_shipping'=>0,
            'discount'=>0,
            'subtotalitens'=>0,
            'price_sale'=>0,
            'rate_total'=>0,
            'amount'=>0,
            'status'=>0,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function saveSale(Request $request){
        DB::table('sales')->
        where('sale_id','=',$request->idSale)->
        update([
            'date_sale'=>$request->dateSale,
            'client_id'=>$request->idClient,
            'platform_id'=>$request->platforms,
            'platform_rate'=>$request->ratePlatform,
            'payment_id'=>$request->payment,
            'payment_rate_fix'=>$request->ratefixPayment,
            'payment_rate_variable'=>$request->ratevariablePayment,
            'payment_rate_month'=>$request->ratevariablePayment,
            'plot_id'=>$request->plots,
            'rate_client_plot'=>$request->rateClient,
            'rate_company_plot'=>$request->rateCompany,
            'shipping_id'=>$request->shipping,
            'price_shipping'=>$request->shippingValue,
            'discount'=>$request->discountSale,
            'subtotalitens'=>$request->itensTotal,
            'price_sale'=>$request->priceSale,
            'rate_total'=>$request->ratePaymentValue,
            'amount'=>$request->amountSale,
            'status'=>'A',
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        $sales = DB::table('sales')->latest()->first();
        if($request->idSale == $sales->sale_id){
            $this->createNewSale();
        }

        return redirect('Vendas');
    }

    public function additensale(Request $request)
    {
        DB::table('saleitens')->insert([
            'sale_id'=>$request->idSale,
            'product_id'=>$request->idProduct,
            'quantity'=>$request->quantityProduct,
            'price'=>$request->priceProduct,
            'subtotal'=>$request->quantityProduct*$request->priceProduct,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
        return redirect('Vendas/Nova');
    }

    public function edtitensale(Request $request)
    {
            DB::table('saleitens')->
            where('saleitens_id','=',$request->edtidItenSale)->
            update([
                'product_id'=>$request->edtidProduct,
                'quantity'=>$request->edtquantityProduct,
                'price'=>$request->edtpriceProduct,
                'subtotal'=>($request->edtquantityProduct)*($request->edtpriceProduct),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        return redirect('Vendas/Nova');
    }

    public function delitensale(Request $request)
    {
        DB::table('saleitens')->
        where('saleitens_id','=',$request->delsaleitens_id)->
        delete();
        return redirect('Vendas/Nova');
    }

    public function additensaleedt(Request $request)
    {
        DB::table('saleitens')->insert([
            'sale_id'=>$request->idSale,
            'product_id'=>$request->idProduct,
            'quantity'=>$request->quantityProduct,
            'price'=>$request->priceProduct,
            'subtotal'=>($request->quantityProduct)*($request->priceProduct),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
        return redirect('Vendas/Editar/'.$request->idSale);
    }

    public function edtitensaleedt(Request $request)
    {
            DB::table('saleitens')->
            where('saleitens_id','=',$request->edtidItenSale)->
            update([
                'product_id'=>$request->edtidProduct,
                'quantity'=>$request->edtquantityProduct,
                'price'=>$request->edtpriceProduct,
                'subtotal'=>($request->edtquantityProduct)*($request->edtpriceProduct),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        return redirect('Vendas/Editar/'.$request->idSale);
    }

    public function delitensaleedt(Request $request)
    {
        DB::table('saleitens')->
        where('saleitens_id','=',$request->delsaleitens_id)->
        delete();
        return redirect('Vendas/Editar/'.$request->idSale);
    }

    public function printSale($idSale){
        return view('Site.Vendas.printsale',['idSale'=>$idSale]);
    }

}
