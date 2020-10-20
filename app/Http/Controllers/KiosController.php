<?php

namespace App\Http\Controllers;

use App\Http\Requests\KiosForm;
use App\Kios;

class KiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kioss']= Kios::where('aktif','1')->get();

        return view('kios.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KiosForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KiosForm $request)
    {
        $check = $request->validated();

        Kios::create($check);

        return redirect()->route('kios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $kode
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        $kios = Kios::where('kode', $kode)->first();

        if(count($kios->user) == 0) {
            Kios::where('kode', $kode)->delete();
        }

        Kios::where('kode', $kode)->update(['aktif' => '0']);

        return redirect()->route('kios.index');
    }
}
