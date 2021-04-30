<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {
        return view('Site.Caixa.index');
        #dd($products, $types, $sizes);
    }
}
