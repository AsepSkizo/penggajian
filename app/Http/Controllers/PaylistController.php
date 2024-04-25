<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Kasbon;
use App\Models\paylist;
use App\Models\salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PaylistController extends Controller
{
    //
    public function index()
    {
        $tanggal = Carbon::now();
        $minggu = $tanggal->format('d');
        $bulan = $tanggal->format('m');
        $tahun = $tanggal->format('Y');
        // dd($minggu);


        if ($minggu >= 15) {
            // Hanya perlu hari akhirnya saja, karna sudah pasti diawali dari tanggal 15
            $tanggalAkhir1 = $tanggal->endOfMonth()->format('d');
            $tanggalAwal = $tahun  . "-" . $bulan . "-15";
            $tanggalAkhir = $tahun  . "-" . $bulan . "-" . $tanggalAkhir1;
            $mingguUSer = "Hanya Menampilkan Data dari Minggu Kedua : " . $tahun . "-" . $bulan . "-15" . " ~ " . $tahun . "-" . $bulan . "-" . $tanggalAkhir1;
            $listgaji = paylist::with(['getkaryawan1', 'getkaryawan2', 'getkaryawan3'])->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->orderBy('tanggal', 'ASC')->paginate(7);
            $data = [
                "teknisi" => employee::all(),
                "listgaji" => $listgaji,
                "title" => "Data Gaji",
                "paylists" => "active",
                "tanggalAwal" => '15',
                "bulan" => $bulan,
                "tahun" => $tahun,
                "detail" => $mingguUSer
            ];
        } else {
            $tanggalAwal = $tahun  . "-" . $bulan . "-01";
            $tanggalAkhir = $tahun  . "-" . $bulan . "-14";
            $mingguUSer = "Hanya Menampilkan Data dari Minggu Pertama : " . $tahun . "-" . $bulan . "-01" . " ~ " . $tahun . "-" . $bulan . "-14";
            $listgaji = paylist::with(['getkaryawan1', 'getkaryawan2', 'getkaryawan3'])->where('tanggal', '>=', $tanggalAwal)->where('tanggal', '<=', $tanggalAkhir)->orderBy('tanggal', 'ASC')->paginate(7);
            $data = [
                "teknisi" => employee::all(),
                "listgaji" => $listgaji,
                "title" => "Data Gaji",
                "paylists" => "active",
                "tanggalAwal" => '1',
                "bulan" => $bulan,
                "tahun" => $tahun,
                "detail" => $mingguUSer
            ];
        };
        return view('penggajian', $data);
    }

    public function store(Request $request)
    {
        $unit = $request->unit;
        $teknisi1 = $request->teknisi1;
        $teknisi2 = $request->teknisi2;
        $teknisi3 = $request->teknisi3;
        $tanggal = $request->tanggal;
        // dd($tanggal);
        if ($teknisi2 == '0') {
            $teknisi2 = Null;
        }
        if ($teknisi3 == '0') {
            $teknisi3 = Null;
        }
        $paylist = paylist::create(
            [
                "karyawan1_id" => $teknisi1,
                "karyawan2_id" => $teknisi2,
                "karyawan3_id" => $teknisi3,
                "unit" => $unit,
                "tanggal" => $tanggal,

            ]
        );
        if ($paylist) {
            return redirect('/paylists');
        }
    }
    public function update(Request $request)
    {
        $unit = $request->unit;
        $teknisi1 = $request->teknisi1;
        $teknisi2 = $request->teknisi2;
        $teknisi3 = $request->teknisi3;
        $tanggal = $request->tanggal;
        $id = $request->id;
        // dd($tanggal);
        if ($teknisi2 == '0') {
            $teknisi2 = Null;
        }
        if ($teknisi3 == '0') {
            $teknisi3 = Null;
        }
        $paylist = paylist::find($id);
        $paylist->karyawan1_id = $teknisi1;
        $paylist->karyawan2_id = $teknisi2;
        $paylist->karyawan3_id = $teknisi3;
        $paylist->unit = $unit;
        $paylist->tanggal = $tanggal;

        $paylist->save();
        if ($paylist) {
            return redirect('/paylists');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $gaji = paylist::find($id);
        $gaji->delete();
        return redirect('/paylists');
    }

    public function indexWithParam($tanggal = false, $bulan = false, $tahun = false)
    {
        if ($tanggal == false) {
            $now = Carbon::now();
            $tanggal = $now->day;
            if ($tanggal >= 15) {
                $mingguKe = 2;
            } else {
                $mingguKe = 1;
            }
        }
        if ($bulan == false) {
            $now = Carbon::now();
            $bulan = $now->month;
        }
        if ($tahun == false) {
            $now = Carbon::now();
            $tahun = $now->year;
        }
        if ($tanggal >= 15) {
            $mingguKe = 2;
        } else {
            $mingguKe = 1;
        }
        // dd($mingguKe, $bulan, $tahun);
        $employees = employee::all();
        $a = 0;
        $paylist = [];
        $getTeknisi1 = salary::where('tipe', 'karyawan1')->get();
        // return $getTeknisi1;
        $bayarTeknisi1 = $getTeknisi1[0]->nominal;
        $getTeknisi2 = salary::where('tipe', 'karyawan2')->get();
        $bayarTeknisi2 = $getTeknisi2[0]->nominal;
        $getTeknisi3 = salary::where('tipe', 'karyawan3')->get();
        $bayarTeknisi3 = $getTeknisi3[0]->nominal;
        // return $bayarTeknisi3;
        foreach ($employees as $employee) {
            // Hitungan Teknisi
            $id = $employee->id;
            $countTeknisi3 = $this->countTeknisi3($id, $mingguKe, $bulan, $tahun);
            $countTeknisi2 = $this->countTeknisi2($id, $mingguKe, $bulan, $tahun);
            $countTeknisi1 = $this->countTeknisi1($id, $mingguKe, $bulan, $tahun);
            $teknisi1 = $this->teknisi1Loop($id, $countTeknisi1);
            $teknisi2 = $this->teknisi2Loop($id, $countTeknisi2);
            $teknisi3 = $this->teknisi3Loop($id, $countTeknisi3);
            // dd($teknisi3);
            // Akhir Hitungan Teknisi
            // Hitungan Kasbon
            $kasbon = $this->hitungKasbon($id, $mingguKe, $bulan, $tahun);
            $paylist[$a]['idteknisi'] = $id;
            $paylist[$a]['karyawan1'] = $teknisi1;
            $paylist[$a]['karyawan2'] = $teknisi2;
            $paylist[$a]['karyawan3'] = $teknisi3;
            $paylist[$a]['kasbon'] = $kasbon;
            $a++;
        }
        $data = [
            "title" => "Penggajian",
            "detail" => "1-14",
            "employees" => $employees,
            "penggajian" => $paylist,
            "bayarTeknisi1" => $bayarTeknisi1,
            "bayarTeknisi2" => $bayarTeknisi2,
            "bayarTeknisi3" => $bayarTeknisi3,
        ];
        // return $data;    
        return view('singlepay', $data);
    }

    public function countTeknisi3($id, $minggu, $bulan, $tahun)
    {
        if ($minggu == 1) {
            $startDate = "$tahun-$bulan-1";
            $endDate = "$tahun-$bulan-14";
        }
        if ($minggu == 2) {
            $startDate = "$tahun-$bulan-15";
            $endOfMonth = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('d');
            $endDate = "$tahun-$bulan-$endOfMonth";
        }
        $teknisi3 = paylist::where(function ($query) use ($id) {
            $query->where('karyawan1_id', $id)
                ->orWhere(function ($subQuery) use ($id) {
                    $subQuery->where('karyawan2_id', $id)
                        ->orWhere('karyawan3_id', $id);
                });
        })->whereNotNull('karyawan2_id')
            ->whereNotNull('karyawan3_id')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get();
        return $teknisi3;
    }
    public function countTeknisi2($id, $minggu, $bulan, $tahun)
    {
        $startDate = 0;
        $endDate = 0;
        if ($minggu == 1) {
            $startDate = "$tahun-$bulan-1";
            $endDate = "$tahun-$bulan-14";
        }
        if ($minggu == 2) {
            $startDate = "$tahun-$bulan-15";
            $endOfMonth = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('d');
            $endDate = "$tahun-$bulan-$endOfMonth";
        }
        $teknisi2 = Paylist::where(function ($query) use ($id) {
            $query->where('karyawan1_id', $id)
                ->orWhere(function ($subQuery) use ($id) {
                    $subQuery->where('karyawan2_id', $id)
                        ->whereNull('karyawan3_id');
                });
        })->whereNotNull('karyawan2_id')
            ->whereNull('karyawan3_id')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get();
        return $teknisi2;
    }
    public function countTeknisi1($id, $minggu, $bulan, $tahun)
    {
        $startDate = 0;
        $endDate = 0;
        if ($minggu == 1) {
            $startDate = "$tahun-$bulan-1";
            $endDate = "$tahun-$bulan-14";
        }
        if ($minggu == 2) {
            $startDate = "$tahun-$bulan-15";
            $endOfMonth = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('d');
            $endDate = "$tahun-$bulan-$endOfMonth";
        }
        $teknisi1 = Paylist::where(function ($query) use ($id) {
            $query->where('karyawan1_id', $id);
        })->whereNull('karyawan2_id')
            ->whereNull('karyawan3_id')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get();
        return $teknisi1;
    }

    public function teknisi3Loop($id, $teknisi3)
    {
        $teknisi3Counted = 0;
        foreach ($teknisi3 as $countedTeknisi3) {
            $karyawan1 = $countedTeknisi3->karyawan1_id;
            $karyawan2 = $countedTeknisi3->karyawan2_id;
            $karyawan3 = $countedTeknisi3->karyawan3_id;
            if ($karyawan1 == $id) {
                $teknisi3Counted += 1;
            }
            if ($karyawan2 == $id) {
                $teknisi3Counted += 1;
            }
            if ($karyawan3 == $id) {
                $teknisi3Counted += 1;
            }
        }
        return $teknisi3Counted;
    }
    public function teknisi2Loop($id, $teknisi2)
    {
        $teknisi2Counted = 0;
        foreach ($teknisi2 as $countedTeknisi2) {
            $karyawan1 = $countedTeknisi2->karyawan1_id;
            $karyawan2 = $countedTeknisi2->karyawan2_id;
            if ($karyawan1 == $id) {
                $teknisi2Counted += 1;
            }
            if ($karyawan2 == $id) {
                $teknisi2Counted += 1;
            }
        }
        return $teknisi2Counted;
    }
    public function teknisi1Loop($id, $teknisi1)
    {
        $teknisi1Counted = 0;
        foreach ($teknisi1 as $countedTeknisi1) {
            $karyawan1 = $countedTeknisi1->karyawan1_id;
            if ($karyawan1 == $id) {
                $teknisi1Counted += 1;
            }
        }
        return $teknisi1Counted;
    }

    public function hitungKasbon($employeeId, $minggu, $bulan, $tahun)
    {
        if ($minggu == 1) {
            $tanggalAwal = 1;
            $tanggalAkhir = 14;
        }
        if ($minggu == 2) {
            $tanggalAwal = 15;
            $tanggalAkhir = Carbon::create($tahun, $bulan, 1)->endOfMonth()->format('d');
        }
        $kasbon = Kasbon::where("employee_id", $employeeId)->whereBetween('tanggal', ["$tahun-$bulan-$tanggalAwal", "$tahun-$bulan-$tanggalAkhir"])->orderBy('created_at', 'desc')->limit(2)->get();
        $kasKaryawan = [];
        // Alasan kenapa $a < 2 karena kasbon hanya bisa 2 kali dalam 2 minggu
        for ($a = 0; $a < 2; $a++) {
            if (!empty($kasbon[$a])) {
                $kasKaryawan['kasbon' . $a] = $kasbon[$a]->nominal;
            } else {
                $kasKaryawan['kasbon' . $a] = NULL;
            }
        }
        return $kasKaryawan;
    }
}
