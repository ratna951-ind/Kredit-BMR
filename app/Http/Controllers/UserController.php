<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserForm;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Kios;
use App\Peran;
use Alert; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users']= User::where('aktif','1')->whereNotIn('peran_id', [1])->get();

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kioss'] = Kios::where('aktif','1')->get();
        $data['perans'] = Peran::all();

        return view('user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserForm $request)
    {
        $check = $request->validated();

        $check['password'] = Hash::make($check['password']);

        $process = User::create($check);

        if ($process) {
            Alert::success('Sukses', 'Data User '.$request->nama.' Berhasil Ditambah!');
        } else {
            Alert::error('Gagal', 'Data User '.$request->nama.' Gagal Ditambah!');
        }

        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['userlama'] = User::find($id);
        $data['kioss'] = Kios::where('aktif','1')->get();
        $data['perans'] = Peran::all();

        return view('user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserForm $request, $id)
    {
        $check = $request->validated();

        if($request->password && $request->password_confirmation){
            $check['password'] = Hash::make($check['password']);
        }

        $process = User::find($id)->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data User '.$request->nama.' Berhasil Diubah!');
        } else {
            Alert::error('Gagal', 'Data User '.$request->nama.' Gagal Diubah!');
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(count($user->jadwal_order) == 0) {
            $process = $user->delete();
        }
        else {
            $process = $user->update(['aktif' => '0']);
        }

        if ($process) {
            Alert::success('Sukses', 'Data User '.$user->nama.' Berhasil Dihapus!');
        } else {
            Alert::error('Gagal', 'Data User '.$user->nama.' Gagal Dihapus!');
        }

        return redirect()->route('user.index');
    }
}
