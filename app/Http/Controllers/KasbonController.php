<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kasbon;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KasbonController extends Controller
{
    // Function untuk mengatasi route
    public function index()
    {
        $date = Carbon::now();
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        $tahun = $date->format('Y');

        $kasbon = $this->getKasbon($tahun, $bulan, $tanggal);

        $detail = '';
        if ($tanggal >= 15) {
            $tanggalAkhir1 = $date->endOfMonth()->format('d');
            $detail = $tahun . "-" . $bulan . "-15" . " ~ " . $tahun . "-" . $bulan . "-" . $tanggalAkhir1;
        } else {
            $detail = $tahun . "-" . $bulan . "-01" . " ~ " . $tahun . "-" . $bulan . "-14";
        }
        $data = [
            "kasbon" => Kasbon::with('getKaryawanKasbon')->get(),
            "employees" => employee::all()->where("is_active",  1),
            "title" => "Kasbon",
            "kasbon" => $kasbon,
            "jumlahKaryawan" =>  employee::count(),
            "detail" => $detail
        ];
        return view("kasbon", $data);
    }
    public function store(Request $request)
    {
        $date = Carbon::now();
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        $tahun = $date->format('Y');

        $idKaryawan = $request->teknisi;
        $nominal = $request->kasbon;
        $tgl = $request->tanggal;
        $totalKasbon = $this->cekKasbon($tahun, $bulan, $tanggal, $idKaryawan);
        // return $totalKasbon;
        if ($totalKasbon >= 2) {
            return redirect('/kasbon');
        } else {
            $data = [
                'employee_id' => $idKaryawan,
                'nominal' => $nominal,
                'tanggal' => $tgl
            ];
            $kasbon = Kasbon::create($data);
            if ($kasbon) {
                return redirect('/kasbon');
            }
        }
    }

    public function update(Request $request)
    {
        $idKasbon = $request->idKasbon;
        $nominal = $request->nominal;
        $kasbon = Kasbon::find($idKasbon);
        $kasbon->nominal = $nominal;
        $kasbon->save();
        // return $kasbon; 

        return redirect('/kasbon');
    }
    public function delete(Request $request)
    {
        $idKasbon = $request->idKasbon;
        $kasbon = Kasbon::find($idKasbon);
        $kasbon->delete();
        // return $kasbon; 

        return redirect('/kasbon');
    }


    // Function tambahan
    public function getKasbon($tahun, $bulan, $tanggal)
    {
        // $kasKaryawan berisi array, setiap 1 array maksimal 2 value. setiap 1 array pada $kasKaryawan merepresentasikan 1 user
        $employees = employee::all();
        $kasKaryawan = [];
        $i = 0;

        if ($tanggal < 15) {
            // $kasSementara berisi array yang akan digunakan untuk menyimpan data sementara dari kas sebelum ditambahkan ke $kasKaryawan
            foreach ($employees as $employee) {
                $coba = Kasbon::where("employee_id", $employee->id)->whereBetween('tanggal', ["$tahun-$bulan-01", "$tahun-$bulan-14"])->orderBy('created_at', 'desc')->limit(2)->get();
                $kasSementara = [];
                // Alasan kenapa $a < 2 karena kasbon hanya bisa 2 kali dalam 2 minggu
                for ($a = 0; $a < 2; $a++) {
                    if (!empty($coba[$a])) {
                        $kasSementara['idKasbon' . $a] =  $coba[$a]->id;
                        $kasSementara['kasbon' . $a] = $coba[$a]->nominal;
                    } else {
                        $kasSementara['idKasbon' . $a] =  NULL;
                        $kasSementara['kasbon' . $a] = NULL;
                    }
                }
                $kasKaryawan[$i] = $kasSementara;
                $i++;
            }
        } else {
            foreach ($employees as $employee) {
                $tanggalAkhir = Carbon::now()->endOfMonth()->format('d');
                $coba = Kasbon::where("employee_id", $employee->id)->whereBetween('tanggal', ["$tahun-$bulan-15", "$tahun-$bulan-$tanggalAkhir"])->orderBy('created_at', 'desc')->limit(2)->get();
                $kasSementara = [];
                // dd($coba);
                for ($a = 0; $a < 2; $a++) {
                    if (!empty($coba[$a])) {
                        $kasSementara['idKasbon' . $a] =  $coba[$a]->id;
                        $kasSementara['kasbon' . $a] = $coba[$a]->nominal;
                    } else {
                        $kasSementara['idKasbon' . $a] =  NULL;
                        $kasSementara['kasbon' . $a] = NULL;
                    }
                }
                $kasKaryawan[$i] = $kasSementara;
                $i++;
            }
        }
        return $kasKaryawan;
    }

    public function cekKasbon($tahun, $bulan, $tanggal, $idKaryawan)
    {
        $totalKasbon = 0;
        if ($tanggal < 15) {
            $totalKasbon = Kasbon::where("employee_id", $idKaryawan)->whereBetween('tanggal', ["$tahun-$bulan-01", "$tahun-$bulan-14"])->count();
        } else {
            $tanggalAkhir = Carbon::now()->endOfMonth()->format('d');
            $totalKasbon = Kasbon::find($idKaryawan)->whereBetween('tanggal', ["$tahun-$bulan-15", "$tahun-$bulan-$tanggalAkhir"])->count();
        }
        return $totalKasbon;
    }
}
