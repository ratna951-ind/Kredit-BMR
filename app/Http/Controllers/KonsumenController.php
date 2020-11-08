<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsumenForm;
use App\Konsumen;
use App\KonsumenPekerjaan;
use App\KonsumenDarurat;
use Alert;

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
            'gambarktp' => 'gambarktp',
            'gambarkk' => 'gambarkk',
        );

        $konsumen_pekerjaan = array(
            'nik' => $check['nik'],
            'tipe' => $check['tipe'],
            'perusahaan' => $check['perusahaan'],
            'masakerja' => $check['masakerja'],
            'alamat_pekerjaan' => $check['alamat_pekerjaan'],
            'telp_pekerjaan' => $check['telp_pekerjaan'],
            'jabatan' => $check['jabatan'],
            'penghasilan' => $check['penghasilan'],
        );

        $konsumen_darurat = array(
            'nik' => $check['nik'],
            'nama_darurat' => $check['nama_darurat'],
            'hubungan' => $check['hubungan'],
            'alamat_darurat' => $check['alamat_darurat'],
            'telp_darurat' => $check['telp_darurat'],
        );

        if($check['status'] == 'K'){
            $konsumen['nama_2'] = $check['nama_2'];
            $konsumen['tmptlahir_2'] = $check['tmptlahir_2'];
            $konsumen['tgllahir_2'] = $check['tgllahir_2'];
            $konsumen['gambarktp_2'] = 'gambarktp_2';
            
            $konsumen_pekerjaan['perusahaan_2'] = $check['perusahaan_2'];
            $konsumen_pekerjaan['alamat_pekerjaan_2'] = $check['alamat_pekerjaan_2'];
            $konsumen_pekerjaan['telp_pekerjaan_2'] = $check['telp_pekerjaan_2'];
            $konsumen_pekerjaan['jabatan_2'] = $check['jabatan_2'];
            $konsumen_pekerjaan['penghasilan_2'] = $check['penghasilan_2'];
        }

        $konsumenTambah = Konsumen::create($konsumen);

        $konsumenPekerjaanTambah = KonsumenPekerjaan::create($konsumen_pekerjaan);

        $konsumenDarurat = KonsumenDarurat::create($konsumen_darurat);

        if ($konsumenTambah && $konsumenPekerjaanTambah && $konsumenDarurat) {
            Alert::success('Sukses', 'Data Konsumen '.$request->nama.' Berhasil Ditambah!');
        } else {
            Alert::error('Gagal', 'Data Konsumen '.$request->nama.' Gagal Ditambah!');
        }

        return redirect()->route('konsumen.index');
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
