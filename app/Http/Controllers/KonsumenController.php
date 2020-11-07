<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsumenForm;
use App\Konsumen;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konsumens'] = Konsumen::all();

        return view('konsumen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konsumen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KonsumenForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KonsumenForm $request)
    {
        $check = $request->validated();

        // dd($check);

        $konsumen = array(
            'nik' => $check['nik'],
            'nama' => $check['nama'],
            'tmptlahir' => $check['tmptlahir'],
            'tgllahir' => $check['tgllahir'],
            'alamatktp' => $check['alamatktp'],
            'alamatskrng' => $check['alamatskrng'],
            'telp' => $check['telp'],
            'jk' => $check['jk'],
            'ibukandung' => $check['ibukandung'],
            'status' => $check['status'],
            'statusrumah' => $check['statusrumah'],
            'lamamenetapbulan' => $check['lamamenetapbulan'],
            'pendidikanterakhir' => $check['pendidikanterakhir'],
            'nama_2' => $check['nama_2'],
            'tmptlahir_2' => $check['tmptlahir_2'],
            'tgllahir_2' => $check['tgllahir_2'],
            // 'gambarktp' => $check['gambarktp'],
            // 'gambarkk' => $check['gambarkk'],
            // 'gambarktp_2' => $check['gambarktp_2'],
            'gambarktp' => 'gambarktp',
            'gambarkk' => 'gambarkk',
            'gambarktp_2' => 'gambarktp_2',
        );

        $konsumen_pekerjaan = array(
            'nik' => $check['nik'],
            'tipe' => $check['tipe'],
            'perusahaan' => $check['perusahaan'],
            'masakerja' => $check['masakerja'],
            'alamat_pekerjaan' => $check['alamat_pekerjaan'],
            'telp_pekerjaan' => $check['telp_pekerjaan'],
            'telp' => $check['telp'],
            'jk' => $check['jk'],
            'ibukandung' => $check['ibukandung'],
            'status' => $check['status'],
            'statusrumah' => $check['statusrumah'],
            'lamamenetapbulan' => $check['lamamenetapbulan'],
            'pendidikanterakhir' => $check['pendidikanterakhir'],
            'nama_2' => $check['nama_2'],
            'tmptlahir_2' => $check['tmptlahir_2'],
            'tgllahir_2' => $check['tgllahir_2'],
            // 'gambarktp' => $check['gambarktp'],
            // 'gambarkk' => $check['gambarkk'],
            // 'gambarktp_2' => $check['gambarktp_2'],
            'gambarktp' => 'gambarktp',
            'gambarkk' => 'gambarkk',
            'gambarktp_2' => 'gambarktp_2',
        );

        $konsumenTambah = Konsumen::create($konsumen);

        $konsumenPekerjaanTambah = KonsumenPekerjaan::create($konsumen_pekerjaan);

        dd($konsumen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
