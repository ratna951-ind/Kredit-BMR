<?php

namespace App\Http\Controllers;

use App\Http\Requests\KiosForm;
use App\Kios;
use Alert;

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

        $process = Kios::create($check);

        if ($process) {
            Alert::success('Sukses', 'Data Kios '.$request->nama.' Berhasil Ditambah!');
        } else {
            Alert::error('Gagal', 'Data Kios '.$request->nama.' Gagal Ditambah!');
        }

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
        $kios = Kios::find($kode);

        if(count($kios->user) == 0) {
            $process = $kios->delete();
        }
        else {
            $process = $kios->update(['aktif' => '0']);
        }

        if ($process) {
            Alert::success('Sukses', 'Data Kios '.$kios->nama.' Berhasil Dihapus!');
        } else {
            Alert::error('Gagal', 'Data Kios '.$kios->nama.' Gagal Dihapus!');
        }

        return redirect()->route('kios.index');
    }
}
