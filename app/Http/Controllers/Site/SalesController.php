<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('Site.Vendas.index');
        #dd($products, $types, $sizes);
    }

    public function indexNew()
    {
        return view('Site.Vendas.newsale');
        #dd($products, $types, $sizes);
    }
}
