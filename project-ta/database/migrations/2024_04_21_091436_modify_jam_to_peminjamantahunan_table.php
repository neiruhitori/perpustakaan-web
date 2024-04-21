<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyJamToPeminjamantahunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('peminjamantahunan', function (Blueprint $table) {
            $table->date('jam_pinjam')->change();
            $table->date('jam_kembali')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('peminjamantahunan', function (Blueprint $table) {
            $table->dateTime('jam_pinjam')->change();
            $table->datetime('jam_kembali')->change();
        });
    }
}
