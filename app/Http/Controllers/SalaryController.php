<?php

namespace App\Http\Controllers;

use App\Models\salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //
    public function index()
    {
        return view("gaji", ['gaji' => salary::all(), 'title' => 'Gaji']);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $salary = salary::find($id);
        $salary->nominal = $request->nominal;
        $salary->save();
        if ($salary) {
            return redirect("/salary");
        }
    }
}
