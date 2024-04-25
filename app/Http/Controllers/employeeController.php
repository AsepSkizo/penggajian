<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\paylist;
use App\Models\salary;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Data Teknisi',
            'employees' => employee::all()->where("is_active", 1)
        ];
        return view('employee', $data);
    }
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'is_active' => 1
        ];
        $employee = employee::create($data);
        if ($employee) {
            return redirect('/employee');
        } else {
            return redirect('/employee');
        }
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $data = [
            'nama' => $request->nama
        ];
        $employee = employee::find($id)->update($data);
        if ($employee) {
            return redirect('/employee');
        } else {
            return redirect('/employee');
        }
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        // $dataGaji = paylist::where('karyawan1_id', $id)
        //     ->orWhere('karyawan2_id', $id)
        //     ->orWhere('karyawan3_id', $id)
        //     ->get();
        // foreach ($dataGaji as $penggajian) {
        //     $penggajian->delete();
        // }
        $employee = employee::find($id);
        $employee->is_active = 0;
        $employee->save();
        if ($employee) {
            return redirect('/employee');
        } else {
            return redirect('/employee');
        }
    }
}
