<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $role = Auth::user()->role_id;
        
        if($role == 1){
            $data['kios'] = Kios::where('aktif','1')->count();
            $data['user'] = User::where('aktif','1')->whereNotIn('peran_id', [1])->count();
            $data['peran'] = Peran::count();
        }
        else if($role == 2){
            
        }
        else if($role == 3){
            
        }
        else if($role == 4){
            
        }
        else if($role == 5){
            
        }
        else if($role == 6){
            
        }

        return view('home', $data);
    }
}
