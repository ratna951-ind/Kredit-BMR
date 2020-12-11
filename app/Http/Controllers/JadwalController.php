<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JadwalForm;
use App\JadwalOrder;
use App\Angsuran;
use App\Konsumen;
use Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->peran_id == 2) {
            $data['jadwals'] = JadwalOrder::where([
                ['status', 'J'],
                ['user_id', Auth::user()->id],
            ])->get();
            
            $data['notif'] = $this->notif(Auth::user()->peran_id);
            return view('jadwal.index-mce', $data);
        }
        else if(Auth::user()->peran_id == 3){
            $kios = Auth::user()->kode_kios;

            $data['jadwals'] = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                $query->where('kode_kios','=',$kios);
            })->where('status', 'J')->get();
            
            $data['notif'] = $this->notif(Auth::user()->peran_id);
            return view('jadwal.index-uh', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['konsumens'] = Konsumen::all();
        $data['angsurans'] = Angsuran::all();

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('jadwal.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalForm $request)
    {
        $check = $request->validated();

        $count = (JadwalOrder::where('nik', $check['nik'])->count())+1;

        $angsuran = (Angsuran::find($check['pinjaman_awal']))->toArray();

        $gambarstnk           = $check['nik']."-".$count."-STNK.".$check['stnk']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_belakang  = $check['nik']."-".$count."-BPKBBelakang.".$check['bpkb_belakang']->getClientOriginalExtension();
        $gambarmtr_dpn        = $check['nik']."-".$count."-MotorDepan.".$check['mtr_dpn']->getClientOriginalExtension();
        $gambarmtr_blkng      = $check['nik']."-".$count."-MotorBelakang.".$check['mtr_blkng']->getClientOriginalExtension();
        $gambarmtr_kanan      = $check['nik']."-".$count."-MotorKanan.".$check['mtr_kanan']->getClientOriginalExtension();
        $gambarmtr_kiri       = $check['nik']."-".$count."-MotorKiri.".$check['mtr_kiri']->getClientOriginalExtension();
        $gambarnosin          = $check['nik']."-".$count."-NoMesin.".$check['nosin']->getClientOriginalExtension();
        $gambarnoka           = $check['nik']."-".$count."-NoRangka.".$check['noka']->getClientOriginalExtension();
        $gambarselfie         = $check['nik']."-".$count."-Selfie.".$check['selfie']->getClientOriginalExtension();

        $uploadgambarstnk = Storage::putFileAs('jadwal_order', $check['stnk'], $gambarstnk);
        $uploadgambarbpkb_depan = Storage::putFileAs('jadwal_order', $check['bpkb_depan'], $gambarbpkb_depan);
        $uploadgambarbpkb_belakang = Storage::putFileAs('jadwal_order', $check['bpkb_belakang'], $gambarbpkb_belakang);
        $uploadgambarmtr_dpn = Storage::putFileAs('jadwal_order', $check['mtr_dpn'], $gambarmtr_dpn);
        $uploadgambarmtr_blkng = Storage::putFileAs('jadwal_order', $check['mtr_blkng'], $gambarmtr_blkng);
        $uploadgambarmtr_kanan = Storage::putFileAs('jadwal_order', $check['mtr_kanan'], $gambarmtr_kanan);
        $uploadgambarmtr_kiri = Storage::putFileAs('jadwal_order', $check['mtr_kiri'], $gambarmtr_kiri);
        $uploadgambarnosin = Storage::putFileAs('jadwal_order', $check['nosin'], $gambarnosin);
        $uploadgambarnoka = Storage::putFileAs('jadwal_order', $check['noka'], $gambarnoka);
        $uploadgambarselfie = Storage::putFileAs('jadwal_order', $check['selfie'], $gambarselfie);

        $jadwal = array(
            'user_id' => Auth::user()->id,
            'nik' => $check['nik'],
            'tgl_jadwal' => now(),
            'pinjaman_awal' => $check['pinjaman_awal'],
            'tenor' => $check['tenor'],
            'angsuran' => $angsuran['bln_'.$check['tenor']],
            'stnk' => $gambarstnk,
            'bpkb_depan' => $gambarbpkb_depan,
            'bpkb_belakang' => $gambarbpkb_belakang,
            'mtr_dpn' => $gambarmtr_dpn,
            'mtr_blkng' => $gambarmtr_blkng,
            'mtr_kanan' => $gambarmtr_kanan,
            'mtr_kiri' => $gambarmtr_kiri,
            'nosin' => $gambarnosin,
            'noka' => $gambarnoka,
            'selfie' => $gambarselfie,
        );

        if (isset($check['kwt_jb'])) {
            $gambarkwt_jb = $check['nik']."-".$count."-KWTJB.".$check['kwt_jb']->getClientOriginalExtension();

            $uploadgambarkwt_jb = Storage::putFileAs('jadwal_order', $check['kwt_jb'], $gambarkwt_jb);

            $jadwal['kwt_jb'] = $gambarkwt_jb;
        }

        $process = JadwalOrder::create($jadwal);

        $nama = (Konsumen::find($check['nik']))->nama;

        if ($process) {
            Alert::success('Sukses', 'Data Jadwal '.$nama.' Berhasil Ditambah!');
        } else {
            Alert::error('Gagal', 'Data Jadwal '.$nama.' Gagal Ditambah!');
        }

        return redirect()->route('jadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['jadwal'] = JadwalOrder::find($id);

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('jadwal.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kios = Auth::user()->kode_kios;

        $data['angsurans'] = Angsuran::all();
        $data['jadwal'] = JadwalOrder::whereHas('user', function ($query) use ($kios) {
            $query->where('kode_kios','=',$kios);
        })->where([
            ['status', 'J'],
            ['no_kontrak', null],
            ['id', $id]
        ])->first();

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('jadwal.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalForm $request, $id)
    {
        $check = $request->validated();

        $angsuran = (Angsuran::find($check['pinjaman_disetujui']))->toArray();

        $check['angsuran'] = $angsuran['bln_'.$check['tenor']];
        $check['status'] = 'O';

        $process = JadwalOrder::find($id)->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data Jadwal Berhasil Diubah!');
        } else {
            Alert::error('Gagal', 'Data Jadwal Gagal Diubah!');
        }

        return redirect()->route('jadwal.index');
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
