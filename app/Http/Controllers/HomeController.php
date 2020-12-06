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
use PDF;
use DB;

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
            $data['order'] = array();
            for ($i=1; $i < 13; $i++) {
                $awal = 
                $akhir = 

                $kios = Auth::user()->kode_kios;
                $temp = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                    $query->where('kode_kios','=',$kios);
                })->where([
                    ['status', 'D'],
                    ['tgl_order', '>=', now()->startOfMonth()],
                    ['tgl_order', '<=', now()->endOfMonth()],
                ])->count();

                // dd($temp);
                array_push($data['order'], );
            }
        }
        else if($role == 3){
            $data['peran'] = Peran::count();
        }
        else if($role == 4){
            $kasbank = KasBank::where('kode_kios', Auth::user()->kode_kios)->orderBy('id', 'desc')->first();
            $data['sisa_saldo'] = $kasbank ? $kasbank->sisa : 0;

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
            $data['kioss'] = Kios::where('aktif','1')->get();
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

    public function laporanOrderIndex()
    {
        $data['kioss'] = Kios::where('aktif','1')->get();

        return view('laporan.index-order',$data);
    }

    public function laporanOrderDetail(Request $request, $kode)
    {
        $data['awal'] = date_format(now()->startOfMonth(),"Y-m-d");
        $data['akhir'] = date_format(now()->endOfMonth(),"Y-m-d");
        $data['kios'] = $kode;
        
        if ($request->awal && $request->akhir) {
            $data['awal'] = $request->awal;
            $data['akhir'] = $request->akhir;
        }

        $data['orders'] = JadwalOrder::whereHas('user', function ($query) use ($kode) {
            $query->where('kode_kios','=',$kode);
        })->where([
            ['tgl_order', '>=', $data['awal']],
            ['tgl_order', '<=', $data['akhir']],
            ['status', 'S']
        ])->orderBy('tgl_order')->get();

        $data['kios'] = Kios::find($kode);
        $data['total'] = 0;

        $data['mces'] = DB::table('users')
            ->select('nama', DB::raw('count(case when status = "S" then 1 end) as total'))
            ->leftJoin('jadwal_order', 'users.id', '=', 'jadwal_order.user_id')
            ->where([
                ['users.peran_id', 2],
                ['users.kode_kios', $kode],
                ['users.aktif', '1'],
            ])
            ->groupBy('users.id')
            ->get();

        // dd($data['mces']);

        switch (count($data['mces'])) {
            case 1:
                $data['col'] = 12;
                break;
            
            case 2:
                $data['col'] = 6;
                break;
            
            case 3:
                $data['col'] = 4;
                break;
            
            case 4:
                $data['col'] = 3;
                break;
            
            case 5:
                $data['col-1'] = 2;
                $data['col-2'] = 3;
                $data['col-3'] = 2;
                $data['col-4'] = 3;
                $data['col-5'] = 2;
                break;
            
            case 6:
                $data['col'] = 2;
                break;
            
            default:
                
                break;
        }

        return view('laporan.detail-order',$data);
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
            ['id' => "S", 'nama' => 'Selesai']
        ];

        $orders = JadwalOrder::whereNotIn('status',['J','O','D','K']);

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

        return view('laporan.laporan-order',$data);
    }

    public function laporanOrderCetak($bulan=null, $tahun=null, $kios=null)
    {
        $orders = JadwalOrder::where('status','S');

        $data['bulan'] = now()->month;
        $data['tahun'] = now()->year;

        $dateFirst = now()->startOfMonth();
        $dateLast = now()->endOfMonth();

        if ($bulan && $tahun) {
            if (is_integer($bulan) && is_integer($tahun)) {
                $data['bulan'] = $bulan;
                $data['tahun'] = $tahun;
                $dateFirst = Carbon::createFromDate($data['tahun'], $data['bulan'], 1)->startOfMonth();
                $dateLast = Carbon::createFromDate($data['tahun'], $data['bulan'], 1)->endOfMonth();
                $data['title'] = $this->namaBulan($bulan)." ".$tahun;
            }
            else {
                $data['awal'] = $dateFirst = $bulan;
                $data['akhir'] = $dateLast = $tahun;
                $data['title'] = date("d-m-Y", strtotime($dateFirst))." sampai ".date("d-m-Y", strtotime($dateLast));
            }
        }
        
        if ($kios) {
            $data['kios'] = (Kios::find($kios))->nama;
        }
        else {
            $data['kios'] = Auth::user()->kios->nama;
            $kios = Auth::user()->kode_kios;
        }

        $data['orders'] = $orders->whereHas('user', function ($query) use ($kios) {
            $query->where('kode_kios','=',$kios);
        })->where([
            ['tgl_order', '>=', $dateFirst],
            ['tgl_order', '<=', $dateLast],
        ])->get();

        $pdf= PDF::loadview('cetakLaporan.order', $data);

        return $pdf->stream();
    }

    public function laporanKeuanganIndex()
    {
        $data['kioss'] = Kios::where('aktif','1')->get();

        return view('laporan.index-keuangan',$data);
    }

    public function laporanKeuanganDetail(Request $request, $kios)
    {
        $data['awal'] = date_format(now()->startOfMonth(),"Y-m-d");
        $data['akhir'] = date_format(now()->endOfMonth(),"Y-m-d");
        $data['kios'] = Kios::find($kios);
        
        if ($request->awal && $request->akhir) {
            $data['awal'] = $request->awal;
            $data['akhir'] = $request->akhir;
        }

        $data['kas_banks'] = KasBank::where([
            ['kode_kios','=', $data['kios']->kode],
            ['tgl', '>=', $data['awal']],
            ['tgl', '<=', $data['akhir']],
        ])->orderBy('tgl')->get();

        return view('laporan.detail-keuangan',$data);
    }

    public function laporanKeuangan(Request $request)
    {
        $data['awal'] = date_format(now()->startOfMonth(),"Y-m-d");
        $data['akhir'] = date_format(now()->endOfMonth(),"Y-m-d");
        
        if ($request->awal && $request->akhir) {
            $data['awal'] = $request->awal;
            $data['akhir'] = $request->akhir;
        }
        
        $kios = Auth::user()->kode_kios;

        $data['kas_banks'] = KasBank::where([
            ['kode_kios','=',$kios],
            ['tgl', '>=', $data['awal']],
            ['tgl', '<=', $data['akhir']],
        ])->orderBy('tgl')->get();

        return view('laporan.laporan-keuangan',$data);
    }

    public function laporanKeuanganCetak($awal=null, $akhir=null, $kios=null)
    {
        $data['awal'] = date_format(now()->startOfMonth(),"Y-m-d");
        $data['akhir'] = date_format(now()->endOfMonth(),"Y-m-d");
        
        if ($awal && $akhir) {
            $data['awal'] = $awal;
            $data['akhir'] = $akhir;
            $data['title'] = date("d-m-Y", strtotime($awal))." sampai ".date("d-m-Y", strtotime($akhir));
        }

        if ($kios) {
            $data['kios'] = (Kios::find($kios))->nama;
        }
        else {
            $data['kios'] = Auth::user()->kios->nama;
            $kios = Auth::user()->kode_kios;
        }

        $data['kas_banks'] = KasBank::where([
            ['kode_kios','=', $kios],
            ['tgl', '>=', $data['awal']],
            ['tgl', '<=', $data['akhir']],
        ])->orderBy('tgl')->get();

        $pdf= PDF::loadview('cetakLaporan.keuangan', $data);

        return $pdf->stream();
    }

    public function pencairanCetak($order)
    {
        $data['order'] = JadwalOrder::find($order);
        
        $data['terbilang'] = $this->penyebut($data['order']->pinjaman_disetujui);

        $pdf= PDF::loadview('cetakLaporan.pencairan', $data);

        return $pdf->stream();
    }

    public function penyebut($nilai) {
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = "". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = " " . $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		}
		return $temp;
	}
}
