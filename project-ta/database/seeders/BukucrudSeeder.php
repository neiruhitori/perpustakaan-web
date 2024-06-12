<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bukucrud;

class BukucrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bukucrud::updateOrCreate([
            'buku' => 'PAI'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'PKn'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'BIN'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'BIG'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'MAT'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'IPA'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'IPS'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'TIK'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'PJOK'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'PRAKARYA (1)'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'PRAKARYA (2)'
        ]);
        Bukucrud::updateOrCreate([
            'buku' => 'BAHASA JAWA'
        ]);
    }
}
