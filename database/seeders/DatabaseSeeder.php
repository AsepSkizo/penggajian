<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\employee;
use App\Models\salary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        employee::create([
            "nama" => "rahmat",
            "is_active" => 1
        ]);
        employee::create([
            "nama" => "bayu",
            "is_active" => 1
        ]);
        user::create(
            [
                "name" => 'admin',
                "password" => bcrypt("admin")
            ]
        );
        salary::create(
            [
                "tipe" => "karyawan1",
                "nominal" => 20000
            ]
        );
        salary::create(
            [
                "tipe" => "karyawan2",
                "nominal" => 15000
            ]
        );
        salary::create(
            [
                "tipe" => "karyawan3",
                "nominal" => 10000
            ]
        );
    }
}
