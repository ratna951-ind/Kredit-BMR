<?php

namespace App\Http\Controllers;

use App\Http\Requests\KonsumenForm;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
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

        $gambarktp = $check['nik']."-KTP.".$check['gambarktp']->getClientOriginalExtension();
        $gambarkk = $check['nik']."-KK.".$check['gambarkk']->getClientOriginalExtension();

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
            'gambarktp' => $gambarktp,
            'gambarkk' => $gambarkk,
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

        $uploadgambarktp = Storage::putFileAs('konsumen', $check['gambarktp'], $gambarktp);

        $uploadgambarkk = Storage::putFileAs('konsumen', $check['gambarkk'], $gambarkk);

        if($check['status'] == 'K'){
            $gambarktp_2 = $check['nik']."-KTP_2.".$check['gambarktp_2']->getClientOriginalExtension();

            $konsumen['nama_2'] = $check['nama_2'];
            $konsumen['tmptlahir_2'] = $check['tmptlahir_2'];
            $konsumen['tgllahir_2'] = $check['tgllahir_2'];
            $konsumen['gambarktp_2'] = $gambarktp_2;
            
            $konsumen_pekerjaan['perusahaan_2'] = $check['perusahaan_2'];
            $konsumen_pekerjaan['alamat_pekerjaan_2'] = $check['alamat_pekerjaan_2'];
            $konsumen_pekerjaan['telp_pekerjaan_2'] = $check['telp_pekerjaan_2'];
            $konsumen_pekerjaan['jabatan_2'] = $check['jabatan_2'];
            $konsumen_pekerjaan['penghasilan_2'] = $check['penghasilan_2'];

            $uploadgambarktp_2 = Storage::putFileAs('konsumen', $check['gambarktp_2'], $gambarktp_2);
        }

        $konsumenTambah = Konsumen::create($konsumen);

        $konsumenPekerjaanTambah = KonsumenPekerjaan::create($konsumen_pekerjaan);

        $konsumenDaruratTambah = KonsumenDarurat::create($konsumen_darurat);

        if ($konsumenTambah && $konsumenPekerjaanTambah && $konsumenDaruratTambah) {
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
    public function show($nik)
    {
        $data['konsumen'] = Konsumen::find($nik);

        return view('konsumen.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nik
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $data['konsumenlama'] = Konsumen::find($nik);

        return view('konsumen.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\KonsumenForm  $request
     * @param  int  $nik
     * @return \Illuminate\Http\Response
     */
    public function update(KonsumenForm $request, $nik)
    {
        $check = $request->validated();

        $konsumenLama = Konsumen::find($nik);

        // if(Storage::exists('konsumen/'. $konsumenLama->gambarktp_2)){
        //     dd(true);
        // }
        // else{
        //     dd(false);
        // }

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

        if(isset($check['gambarktp'])){
            $gambarktp = $check['nik']."-KTP.".$check['gambarktp']->getClientOriginalExtension();

            if(Storage::exists('konsumen/'. $konsumenLama->gambarktp)){
                Storage::delete('konsumen/'. $konsumenLama->gambarktp);
            }
            
            $uploadgambarktp = Storage::putFileAs('konsumen', $check['gambarktp'], $gambarktp);

            $konsumen['gambarktp'] = $gambarktp;
        }

        if(isset($check['gambarkk'])){
            $gambarkk = $check['nik']."-KK.".$check['gambarkk']->getClientOriginalExtension();

            if(Storage::exists('konsumen/'. $konsumenLama->gambarkk)){
                Storage::delete('konsumen/'. $konsumenLama->gambarkk);
            }

            $uploadgambarkk = Storage::putFileAs('konsumen', $check['gambarkk'], $gambarkk);

            $konsumen['gambarkk'] = $gambarkk;
        }

        if($check['status'] == 'K'){
            if(isset($check['gambarktp_2'])){
                $gambarktp_2 = $check['nik']."-KTP_2.".$check['gambarktp_2']->getClientOriginalExtension();

                if(Storage::exists('konsumen/'. $konsumenLama->gambarktp_2)){
                    Storage::delete('konsumen/'. $konsumenLama->gambarktp_2);
                }
                
                $uploadgambarktp_2 = Storage::putFileAs('konsumen', $check['gambarktp_2'], $gambarktp_2);

                $konsumen['gambarktp_2'] = $gambarktp_2;
            }

            $konsumen['nama_2'] = $check['nama_2'];
            $konsumen['tmptlahir_2'] = $check['tmptlahir_2'];
            $konsumen['tgllahir_2'] = $check['tgllahir_2'];
            
            $konsumen_pekerjaan['perusahaan_2'] = $check['perusahaan_2'];
            $konsumen_pekerjaan['alamat_pekerjaan_2'] = $check['alamat_pekerjaan_2'];
            $konsumen_pekerjaan['telp_pekerjaan_2'] = $check['telp_pekerjaan_2'];
            $konsumen_pekerjaan['jabatan_2'] = $check['jabatan_2'];
            $konsumen_pekerjaan['penghasilan_2'] = $check['penghasilan_2'];
        } else {
            $konsumen['gambarktp_2'] = null;

            $konsumen['nama_2'] = null;
            $konsumen['tmptlahir_2'] = null;
            $konsumen['tgllahir_2'] = null;
            
            $konsumen_pekerjaan['perusahaan_2'] = null;
            $konsumen_pekerjaan['alamat_pekerjaan_2'] = null;
            $konsumen_pekerjaan['telp_pekerjaan_2'] = null;
            $konsumen_pekerjaan['jabatan_2'] = null;
            $konsumen_pekerjaan['penghasilan_2'] = null;

            if(Storage::exists('konsumen/'. $konsumenLama->gambarktp_2)){
                Storage::delete('konsumen/'. $konsumenLama->gambarktp_2);
            }
        }

        $konsumenUbah = Konsumen::find($nik)->update($konsumen);

        $konsumenPekerjaanUbah = KonsumenPekerjaan::find($check['nik'])->update($konsumen_pekerjaan);

        $konsumenDaruratUbah = KonsumenDarurat::find($check['nik'])->update($konsumen_darurat);

        Cache::flush();

        if ($konsumenUbah && $konsumenPekerjaanUbah && $konsumenDaruratUbah) {
            Alert::success('Sukses', 'Data Konsumen '.$request->nama.' Berhasil Diubah!');
        } else {
            Alert::error('Gagal', 'Data Konsumen '.$request->nama.' Gagal Diubah!');
        }

        return redirect()->route('konsumen.index');
    }
}
