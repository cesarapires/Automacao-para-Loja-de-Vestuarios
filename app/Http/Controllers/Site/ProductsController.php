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
        $types = DB::table('types')->get();
        return view('Site.Produtos.Tipos.index',['types' => $types,]);
    }

    public function indexTamanhos()
    {
        $sizes = DB::table('sizes')->get();
        return view('Site.Produtos.Tamanhos.index',['sizes' => $sizes,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function storeProduct(Request $request)
    {
        DB::table('products')->insert([
            'url'=>strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", 
            strtr(utf8_decode(trim($request->nameProduct)), 
            utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
            "aaaaeeiooouuncAAAAEEIOOOUUNC-"))),
            'name'=>$request->name,
            'color'=>$request->color,
            'type_id'=>$request->type,
            'size_id'=>$request->size,
            'price_buy'=>$request->pricebuy,
            'price_sell'=>$request->pricesell,
            //'visible'=>1,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
            'stock'=>$request->stock
        ]);
        return redirect('Produtos');
    }

    public function storeType(Request $request){
        DB::table('types')->insert([
            'name'=>$request->nameType,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Produtos/Tipos');
    }

    public function storeSize(Request $request){
        DB::table('sizes')->insert([
            'name'=>$request->nameSize,
            'created_at' => date("Y-m-d H:i:s"),  
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);        
        return redirect('Produtos/Tamanhos');
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
    
    public function updateProduct(Request $request)
    {
        DB::table('products')->
        where('product_id','=',$request->edtidProduct)->
        update([
            'url'=>strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", 
            strtr(utf8_decode(trim($request->edtnameProduct)), 
            utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
            "aaaaeeiooouuncAAAAEEIOOOUUNC-")) ),
            'name'=>$request->edtname,
            'color'=>$request->edtcolor,
            'type_id'=>$request->edttype,
            'size_id'=>$request->edtsize,
            'stock'=>$request->edtstock,
            'price_buy'=>$request->edtpricebuy,
            'price_sell'=>$request->edtpricesell, 
            'updated_at' => date("Y-m-d H:i:s")
            
        ]);
        return redirect('Produtos');
    }

    public function updateType(Request $request)
    {
        DB::table('types')->
        where('type_id','=',$request->edtidType)->
        update([
            'name'=>$request->edtnameType, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Produtos/Tipos');
    }

    public function updateSize(Request $request)
    {
        DB::table('sizes')->
        where('size_id','=',$request->edtidSize)->
        update([
            'name'=>$request->edtnameSize, 
            'updated_at' => date("Y-m-d H:i:s")  
        ]);        
        return redirect('Produtos/Tamanhos');
    }

    public function deleteProduct(Request $request)
    {
        DB::table('products')->
        where('product_id','=',$request->delidProduct)->
        delete();
        return redirect('Produtos');
    }

    public function deleteType(Request $request)
    {
        DB::table('types')->
        where('type_id','=',$request->delidType)->
        delete();
        return redirect('Produtos/Tipos');
    }

    public function deleteSize(Request $request)
    {
        DB::table('sizes')->
        where('size_id','=',$request->delidSize)->
        delete();
        return redirect('Produtos/Tamanhos');
    }

    public function searchProducts($idProduct){
        $products = DB::table('products')
        ->select()
        ->where('product_id','=',$idProduct)
        ->get();
        return response()->json($products);
    }
}
