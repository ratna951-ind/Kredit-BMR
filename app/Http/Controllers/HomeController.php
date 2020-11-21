<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kios;
use App\User;
use App\Peran;
use Alert;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->peran_id;
        
        if($role == 1){
            $data['kios'] = Kios::where('aktif','1')->count();
            $data['user'] = User::where('aktif','1')->whereNotIn('peran_id', [1])->count();
            $data['peran'] = Peran::count();
        }
        else if($role == 2){
            $data['peran'] = Peran::count();
        }
        else if($role == 3){
            $data['peran'] = Peran::count();
        }
        else if($role == 4){
            $data['peran'] = Peran::count();
        }
        else if($role == 5){
            $data['peran'] = Peran::count();
        }
        else if($role == 6){
            $data['peran'] = Peran::count();
        }

        return view('home', $data);
    }

    public function image($module, $file_name)
    {
        try {
            $storagePath = storage_path('app/'. $module .'/' . $file_name);
            return response()->file($storagePath);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    public function profile()
    {
        return view('profil.index');
    }

    public function editProfile()
    {
        return view('profil.edit');
    }

    public function updateProfile(UserForm $request, $id)
    {
        $check = $request->validated();

        if($request->password && $request->password_confirmation){
            $check['password'] = Hash::make($check['password']);
        }

        $process = User::find($id)->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data Profil Berhasil Diubah!');
        } else {
            Alert::error('Gagal', 'Data Profil Gagal Diubah!');
        }

        return redirect()->route('profile.index');
    }
}
