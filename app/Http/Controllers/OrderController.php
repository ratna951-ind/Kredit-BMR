<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\OrderForm;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\JadwalOrder;
use App\KasBank;
use Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->peran_id==4) {
            $kios = Auth::user()->kode_kios;
            $data['orders'] = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                $query->where('kode_kios','=',$kios);
            })->where([
                ['status', 'D'],
                ['no_kontrak', null]
            ])->get();

            $data['notif'] = $this->notif(Auth::user()->peran_id);
            return view('order.index-admin',$data);
        }
        else{
            $data['months'] = [
                ['id' => 1, 'nama' => 'Januari'],
                ['id' => 2, 'nama' => 'Februari'],
                ['id' => 3, 'nama' => 'Maret'],
                ['id' => 4, 'nama' => 'April'],
                ['id' => 5, 'nama' => 'Mei'],
                ['id' => 6, 'nama' => 'Juni'],
                ['id' => 7, 'nama' => 'Juli'],
                ['id' => 8, 'nama' => 'Agustus'],
                ['id' => 9, 'nama' => 'September'],
                ['id' => 10, 'nama' => 'Oktober'],
                ['id' => 11, 'nama' => 'November'],
                ['id' => 12, 'nama' => 'Desember'],
            ];

            $data['statuss'] = [
                ['id' => "O", 'nama' => 'Order'],
                ['id' => "B", 'nama' => 'Batal'],
                ['id' => "T", 'nama' => 'Tolak'],
                ['id' => "K", 'nama' => 'Kontrak'],
                ['id' => "S", 'nama' => 'Selesai']
            ];

            $orders = JadwalOrder::whereNotIn('status',['J','D']);

            $data['bulan'] = now()->month;
            $data['tahun'] = now()->year;
            $data['stts'] = null;

            $dateFirst = now()->startOfMonth();
            $dateLast = now()->endOfMonth();

            if ($request->bulan && $request->tahun) {
                $data['bulan'] = $request->bulan;
                $data['tahun'] = $request->tahun;
                $dateFirst = Carbon::createFromDate($data['tahun'], $data['bulan'], 1)->startOfMonth();
                $dateLast = Carbon::createFromDate($data['tahun'], $data['bulan'], 1)->endOfMonth();
            }
            
            if ($request->status) {
                $orders->where('status', $request->status);
                $data['stts'] = $request->status;
            }
            
            $data['orders'] = $orders->where([
                ['tgl_order', '>=', $dateFirst],
                ['tgl_order', '<=', $dateLast],
                ['user_id', Auth::user()->id],
            ])->get();

            $data['notif'] = $this->notif(Auth::user()->peran_id);
            return view('order.index',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] = JadwalOrder::find($id);

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('order.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['order'] = JadwalOrder::where('status', 'O')->where('id', $id)->first();

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderForm $request, $id)
    {
        $check = $request->validated();

        $data = JadwalOrder::find($id);
        $check['status'] = 'B';
        $check['tgl_order'] = now();
        $process = $data->update($check);
        
        if ($process) {
            Alert::success('Sukses', 'Data Order '.$data->konsumen->nama.' Berhasil Dibatalkan!');
        } else {
            Alert::error('Gagal', 'Data Order '.$data->konsumen->nama.' Gagal Dibatalkan!');
        }

        return redirect()->route('order.index');
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

    public function approve($id)
    {
        $data = JadwalOrder::find($id);
        $check['status'] = 'D';
        $check['tgl_order'] = now();
        $process = $data->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data Order '.$data->konsumen->nama.' Berhasil Disetujui!');
        } else {
            Alert::error('Gagal', 'Data Order '.$data->konsumen->nama.' Gagal Disetujui!');
        }

        return redirect()->route('order.index');
    }

    public function kontrak(Request $request, $id)
    {
        if($request->no_kontrak == null || $request->no_kontrak == "") {
            Alert::error('Gagal', 'Data No Kontrak Tidak Boleh Kosong!');
        }
        else{
            $data = JadwalOrder::find($id);
            $check['no_kontrak'] = $request->no_kontrak;
            $check['status'] = "S";
            $process = $data->update($check);

            if ($process) {
                Alert::success('Sukses', 'Data No Kontrak Order '.$data->konsumen->nama.' Berhasil Ditambahkan!');
            } else {
                Alert::error('Gagal', 'Data No Kontrak Order '.$data->konsumen->nama.' Gagal Ditambahkan!');
            }
        }

        return redirect()->route('order.index');
    }

    public function accept($id)
    {
        $data['order'] = JadwalOrder::where([
            ['status', 'D'],
            ['no_kontrak', null],
            ['id', $id],
        ])->first();

        $kasbank = KasBank::where('kode_kios', Auth::user()->kode_kios)->orderBy('id', 'desc')->first();
        $sisa = $kasbank ? $kasbank->sisa : 0;

        if ($sisa<$data['order']->pinjaman_disetujui) {
            Alert::error('Gagal', 'Saldo Kios Tidak Mencukupi!');

            return redirect()->route('order.index');
        }

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('order.edit', $data);
    }

    public function acceptUpdate(OrderForm $request, $id)
    {
        $check = $request->validated();

        $order = JadwalOrder::find($id);

        $kasbank = KasBank::where('kode_kios', Auth::user()->kode_kios)->orderBy('id', 'desc')->first();
        $sisa = $kasbank ? $kasbank->sisa : 0;

        $check['kode_kios'] = Auth::user()->kode_kios;
        $check['order_id'] = $id;
        $check['jenis'] = 'P';
        $check['tgl'] = now();
        $check['jumlah'] = $order->pinjaman_disetujui;
        $check['sisa'] = $sisa - $check['jumlah'];

        $gambarbukti = $order->nik."-".$id."-Pencairan.".$check['bukti_std']->getClientOriginalExtension();
        $uploadgambarbukti = Storage::putFileAs('pencairan', $check['bukti_std'], $gambarbukti);
        $check['bukti_std'] = $gambarbukti;

        $checkOrder['status'] = 'K';
        $checkOrder['tgl_order'] = now();
        $checkOrder['tgl_tempo'] = now()->addMonth(1);
        $checkOrder['tgl_selesai'] = now()->addMonth($order->tenor);

        $processOrder = $order->update($checkOrder);

        $process = KasBank::create($check);

        if ($process && $processOrder) {
            Alert::success('Sukses', 'Data Pencairan '.$order->konsumen->nama.' Berhasil Diproses!');
        } else {
            Alert::error('Gagal', 'Data Pencairan '.$order->konsumen->nama.' Gagal Diproses!');
        }

        return redirect()->route('order.index');
    }
}
