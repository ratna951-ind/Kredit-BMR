<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasBankController extends Controller
{
    public function index()
    {
        return view('kasbank.index');
    }

    public function store(Request $request)
    {
        //
    }
}
