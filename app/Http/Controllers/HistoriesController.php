<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoriesController extends Controller
{
    //
    public function index($tahun = false)
    {
        if ($tahun == false) {
            $tahun = Carbon::now()->format('Y');
        }
        $data = [
            'histories' => 'active',
            'title' => 'Riwayat',
            'tahun' => $tahun,
        ];
        return view('riwayat', $data);
    }

  
}
