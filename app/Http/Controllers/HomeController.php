<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\JadwalOrder;
use App\KasBank;
use App\Kios;
use App\User;
use App\Peran;
use Alert;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->peran_id;
        
        if($role == 1){
            $data['kios'] = Kios::where('aktif','1')->count();
            $data['user'] = User::where('aktif','1')->whereNotIn('peran_id', [1])->count();
            $data['peran'] = Peran::count();
        }
        else if($role == 2){
            $data['peran'] = Peran::count();
        }
        else if($role == 3){
            $data['peran'] = Peran::count();
        }
        else if($role == 4){
            $data['sisa_saldo'] = (KasBank::where('kode_kios', Auth::user()->kode_kios)->orderBy('id', 'desc')->first())->sisa;

            $kios = Auth::user()->kode_kios;
            $data['order'] = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                $query->where('kode_kios','=',$kios);
            })->where([
                ['status', 'D'],
                ['tgl_order', '>=', now()->startOfMonth()],
                ['tgl_order', '<=', now()->endOfMonth()],
            ])->count();
        }
        else if($role == 5){
            $data['peran'] = Peran::count();
        }
        else if($role == 6){
            $data['peran'] = Peran::count();
        }

        return view('home', $data);
    }

    public function image($module, $file_name)
    {
        try {
            $storagePath = storage_path('app/'. $module .'/' . $file_name);
            return response()->file($storagePath);
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    public function profile()
    {
        return view('profil.index');
    }

    public function editProfile()
    {
        return view('profil.edit');
    }

    public function updateProfile(UserForm $request, $id)
    {
        $check = $request->validated();

        if($request->password && $request->password_confirmation){
            $check['password'] = Hash::make($check['password']);
        }

        $process = User::find($id)->update($check);

        if ($process) {
            Alert::success('Sukses', 'Data Profil Berhasil Diubah!');
        } else {
            Alert::error('Gagal', 'Data Profil Gagal Diubah!');
        }

        return redirect()->route('profile.index');
    }

    public function laporanOrder(Request $request)
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
            ['id' => "B", 'nama' => 'Batal'],
            ['id' => "D", 'nama' => 'Diterima']
        ];

        $orders = JadwalOrder::whereNotIn('status',['J','O']);

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
        
        $kios = Auth::user()->kode_kios;

        $data['orders'] = $orders->whereHas('user', function ($query) use ($kios) {
            $query->where('kode_kios','=',$kios);
        })->where([
            ['tgl_order', '>=', $dateFirst],
            ['tgl_order', '<=', $dateLast],
        ])->get();

        return view('laporan.index-order',$data);
    }
}
