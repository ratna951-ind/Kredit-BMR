<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PembebananForm;
use App\JadwalOrder;
use App\DetailPembebanan;
use Carbon\Carbon;
use Alert;

class PembebananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['awal'] = date_format(now()->startOfMonth(),"Y-m-d");
        $data['akhir'] = date_format(now()->endOfMonth(),"Y-m-d");

        if ($request->awal && $request->akhir) {
            $data['awal'] = $request->awal;
            $data['akhir'] = $request->akhir;
        }

        $data['pembebanans'] = JadwalOrder::where([
            ['status', 'S'],
            ['no_kontrak', '!=', null],
            ['user_id', Auth::user()->id],
            ['tgl_tempo', '>=', $data['awal']],
            ['tgl_tempo', '<=', $data['akhir']],
        ])->get();

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('pembebanan.index',$data);
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
        return view('pembebanan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['order'] = JadwalOrder::where([
            ['status', 'S'],
            ['no_kontrak', '!=', null],
            ['id', $id],
            ['user_id', Auth::user()->id],
        ])->has('pembebanan', '<', 3)->first();

        if (!($data['order'])) {
            return redirect()->route('pembebanan.index');
        }

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('pembebanan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PembebananForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PembebananForm $request, $id)
    {
        $check = $request->validated();

        $order = JadwalOrder::find($id);

        $check['order_id'] = $id;

        $checkOrder['tgl_tempo'] = Carbon::createFromFormat('Y-m-d', $order->tgl_tempo)->addMonth(1);

        $processOrder = $order->update($checkOrder);
        
        $process = DetailPembebanan::create($check);

        if ($process) {
            Alert::success('Sukses', 'Data Pembebanan Berhasil Ditambahkan!');
        } else {
            Alert::error('Gagal', 'Data Pembebanan Gagal Ditambahkan!');
        }

        return redirect()->route('pembebanan.index');
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

    public function history()
    {
        $data['pembebanans'] = JadwalOrder::where([
            ['status', 'S'],
            ['no_kontrak', '!=', null],
            ['user_id', Auth::user()->id],
        ])->has('pembebanan', '=', 3)->get();

        $data['notif'] = $this->notif(Auth::user()->peran_id);
        return view('pembebanan.history',$data);
    }
}
