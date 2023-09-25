<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kwitansi');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->bigint('no_hp');
            $table->text('terbilang');
            $table->text('pembayaran');
            $table->string('keterangan');
            $table->text('lokasi');
            $table->string('no_kavling');
            $table->text('type');
            $table->text('luas');
            $table->text('jumlah');
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
        Schema::dropIfExists('kwitansis');
    }
}
