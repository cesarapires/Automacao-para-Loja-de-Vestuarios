<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products = DB::table('products')
        ->join('types', 'products.type_id', '=', 'types.type_id')
        ->join('sizes', 'products.size_id', '=', 'sizes.size_id')
        ->select('products.*', 'types.name as type_name', 'sizes.name as size_name')
        ->get();
        $types = DB::table('types')->get();
        $sizes = DB::table('sizes')->get();
        return view('Site.Produtos.index',[
            'products' => $products,
            'types' => $types,
            'sizes' => $sizes,
            ]);
        #dd($products, $types, $sizes);
    }

    public function indexTipos()
    {
        return view('Site.Produtos.Tipos.index');
    }

    public function indexTamanhos()
    {
        return view('Site.Produtos.Tamanhos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*$products=$this->objProduct->all();
        return view('create',compact('products'));
        DB::table('users')->insert([
            'email' => 'kayla@example.com',
            'votes' => 0
        ]);*/
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$products=$this->objProduct->all();
        return view('create',compact('products'));*/

        DB::table('products')->insert([
            'name'=>$request->nameProduct,
            'type_id'=>$request->type_IdProduct,
            'size_id'=>$request->size_IdProduct,
            'price_buy'=>$request->price_BuyProduct,
            'price_sell'=>$request->price_SellProduct,
            'date_buy' => date("Y-m-d"),  
            'stock'=>$request->stockProduct
        ]);

        return redirect('Produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
