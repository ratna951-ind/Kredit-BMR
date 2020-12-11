<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\JadwalOrder;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notif(int $peran)
    {
        $temp=null;
        $temp['count'] = 0;
        $temp['content'] = array();

        if ($peran == 2) {
            $order = JadwalOrder::where([
                ['status','O'],
                ['user_id', Auth::user()->id],
            ])->orWhere([
                ['status','K'],
                ['user_id', Auth::user()->id],
            ])->count();
            if($order){
                array_push($temp['content'], array('title' => 'Order', 'desc' => 'Terdapat '.$order.' order belum diproses!', 'href' => 'order.index', 'icon' => 'ft-file'));
                $temp['count'] += 1;
            }
            $pembebanan = JadwalOrder::where([
                ['status', 'S'],
                ['no_kontrak', '!=', null],
            ])->has('pembebanan', '<', 3)->count();
            if ($pembebanan) {
                array_push($temp['content'], array('title' => 'Pembebanan', 'desc' => 'Terdapat '.$pembebanan.' pembebanan belum selesai!', 'href' => 'pembebanan.index', 'icon' => 'ft-file'));
                $temp['count'] += 1;
            }
        } elseif ($peran == 3) {
            $kios = Auth::user()->kode_kios;
            $jadwal = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                $query->where('kode_kios','=',$kios);
            })->where('status', 'J')->count();
            if($jadwal){
                array_push($temp['content'], array('title' => 'Order', 'desc' => 'Terdapat '.$jadwal.' jadwal belum diproses!', 'href' => 'order.index', 'icon' => 'ft-file'));
                $temp['count'] += 1;
            }
        } elseif ($peran == 4) {
            $kios = Auth::user()->kode_kios;
            $order = JadwalOrder::whereHas('user', function ($query) use ($kios) {
                $query->where('kode_kios','=',$kios);
            })->where([
                ['status', 'D'],
                ['no_kontrak', null]
            ])->count();
            if($order){
                array_push($temp['content'], array('title' => 'Order', 'desc' => 'Terdapat '.$order.' pencairan order belum diproses!', 'href' => 'order.index', 'icon' => 'ft-file'));
                $temp['count'] += 1;
            }
        }
        return $temp;
    }

    public function namaBulan(int $month)
    {
        switch ($month) {
            case 1:
                $result = "Januari";
                break;
            
            case 2:
                $result = "Februari";
                break;
            
            case 3:
                $result = "Maret";
                break;
            
            case 4:
                $result = "April";
                break;
            
            case 5:
                $result = "Mei";
                break;
            
            case 6:
                $result = "Juni";
                break;
            
            case 7:
                $result = "Juli";
                break;
            
            case 8:
                $result = "Agustus";
                break;
            
            case 9:
                $result = "September";
                break;
            
            case 10:
                $result = "Oktober";
                break;
            
            case 11:
                $result = "November";
                break;
            
            case 12:
                $result = "Desember";
                break;
            
            default:
                $result = $month;
                break;
        }

        return $result;
    }
}
