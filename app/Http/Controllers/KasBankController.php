<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KasBankForm;
use Illuminate\Support\Facades\Auth;
use App\KasBank;
use Alert;

class KasBankController extends Controller
{
    public function index()
    {
        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('kasbank.index');
    }

    public function store(KasBankForm $request)
    {
        $check = $request->validated();

        $kasbank = KasBank::where('kode_kios', Auth::user()->kode_kios)->orderBy('id', 'desc')->first();
        $sisa = $kasbank ? $kasbank->sisa : 0;
        if($check['jenis'] == "PK"){
            $check['sisa'] = $sisa + $check['jumlah'];
        }
        elseif($check['jenis'] == "CO"){
            $check['sisa'] = $sisa - $check['jumlah'];
        }

        $check['kode_kios'] = Auth::user()->kode_kios;

        $process = KasBank::create($check);

        switch ($check['jenis']) {
            case 'CO':
                $jenis = "Cash Opname";
                break;
            
            case 'PK':
                $jenis = "Pengisian Kas";
                break;

            case 'P':
                $jenis = "Pencairan";
                break;
        }

        if ($process) {
            Alert::success('Sukses', 'Data '.$jenis.' Berhasil Diproses!');
        } else {
            Alert::error('Gagal', 'Data '.$jenis.' Gagal Diproses!');
        }

        return redirect()->route('kas_bank.index');
    }
}
