<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalForm;
use App\JadwalOrder;
use App\Konsumen;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jadwals'] = JadwalOrder::where('status', 'J')->get();

        return view('jadwal.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['konsumens'] = Konsumen::all();

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

        $gambarstnk           = $check['nik']."-".$count."-STNK.".$check['stnk']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_belakang  = $check['nik']."-".$count."-BPKBBelakang.".$check['bpkb_belakang']->getClientOriginalExtension();
        $gambarkwt_jb         = $check['nik']."-".$count."-KWTJB.".$check['kwt_jb']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();
        $gambarbpkb_depan     = $check['nik']."-".$count."-BPKBDepan.".$check['bpkb_depan']->getClientOriginalExtension();

        dd($count);
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
