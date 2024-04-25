<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasbon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getKaryawanKasbon()
    {
        return $this->belongsTo(employee::class, "employee_id", "id");
    }
}
