<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paylist extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getkaryawan1()
    {
        return $this->belongsTo(employee::class, "karyawan1_id", "id");
    }
    public function getkaryawan2()
    {
        return $this->belongsTo(employee::class, "karyawan2_id", "id");
    }
    public function getkaryawan3()
    {
        return $this->belongsTo(employee::class, "karyawan3_id", "id");
    }
}
