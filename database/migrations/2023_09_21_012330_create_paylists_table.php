<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paylists', function (Blueprint $table) {
            $table->id();
            $table->foreignId("karyawan1_id");
            $table->foreignId("karyawan2_id")->nullable();
            $table->foreignId("karyawan3_id")->nullable();
            $table->string("unit");
            $table->date("tanggal");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paylists');
    }
}
