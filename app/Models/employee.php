<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function karyawan1()
    {
        return $this->hasMany(paylist::class, "karyawan1_id", "id");
    }
    public function karyawan2()
    {
        return $this->hasMany(paylist::class, "karyawan2_id", "id");
    }
    public function karyawan3()
    {
        return $this->hasMany(paylist::class, "karyawan3_id", "id");
    }
    public function kasbon()
    {
        return $this->hasMany(Kasbon::class, "employee_id", "id");
    }
}
