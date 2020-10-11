<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kios;
use App\User;
use App\Peran;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['kios'] = Kios::where('aktif','1')->count();
        $data['user'] = User::where('aktif','1')->whereNotIn('peran_id', [1])->count();
        $data['peran'] = Peran::count();

        return view('home', $data);
    }
}
