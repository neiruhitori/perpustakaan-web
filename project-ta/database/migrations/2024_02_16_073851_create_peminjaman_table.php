<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buku');
            // $table->integer('buku_id')->unsigned();
            // $table->foreign('buku_id')->references('id')->on('bukus');
            $table->string('name'); 
            $table->string('kelas'); 
            $table->string('jml_buku'); 
            $table->dateTime('jam_pinjam');
            $table->datetime('jam_kembali');
            $table->text('description');
            $table->integer('status')->default(1); // 0: disable, 1: enable
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
        Schema::dropIfExists('peminjaman');
    }
}
