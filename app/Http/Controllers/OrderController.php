<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderForm;
use Carbon\Carbon;
use App\JadwalOrder;
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
            ['id' => "T", 'nama' => 'Tolak'],
            ['id' => "O", 'nama' => 'Order'],
            ['id' => "B", 'nama' => 'Batal'],
            ['id' => "D", 'nama' => 'Diterima']
        ];

        $orders = JadwalOrder::whereNotIn('status',['J']);

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
        ])->get();

        return view('order.index',$data);
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
        $process = $data->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data Order '.$data->konsumen->nama.' Berhasil Disetujui!');
        } else {
            Alert::error('Gagal', 'Data Order '.$data->konsumen->nama.' Gagal Disetujui!');
        }

        return redirect()->route('order.index');
    }
}
