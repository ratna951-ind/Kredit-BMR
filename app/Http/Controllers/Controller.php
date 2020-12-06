<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
