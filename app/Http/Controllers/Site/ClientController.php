<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('Site.Clientes.index');
        #dd($products, $types, $sizes);
    }
}
