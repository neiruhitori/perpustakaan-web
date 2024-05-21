<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamantahunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamantahunan', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('kelas'); 
            // $table->string('buku');
            // $table->string('jml_buku'); 
            $table->date('jam_pinjam');
            $table->date('jam_kembali');
            $table->text('description')->nullable();
            $table->integer('status')->default(1); // 0: disable, 1: enable
            $table->timestamps();
            // $table->string('kodebuku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamantahunan');
    }
}
