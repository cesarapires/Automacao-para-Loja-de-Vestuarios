<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        return view('Site.Contas.index');
        #dd($products, $types, $sizes);
    }
}
