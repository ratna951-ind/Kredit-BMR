<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PembebananForm;
use App\JadwalOrder;
use App\DetailPembebanan;
use Alert;

class PembebananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pembebanans'] = JadwalOrder::where([
            ['status', 'D'],
            ['no_kontrak', '!=', null],
        ])->has('pembebanan', '<', 3)->get();

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
            ['status', 'D'],
            ['no_kontrak', '!=', null],
            ['id', $id],
        ])->has('pembebanan', '<', 3)->first();

        if (!($data['order'])) {
            return redirect()->route('pembebanan.index');
        }

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

        $check['order_id'] = $id;

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
            ['status', 'D'],
            ['no_kontrak', '!=', null],
        ])->has('pembebanan', '=', 3)->get();

        return view('pembebanan.history',$data);
    }
}
