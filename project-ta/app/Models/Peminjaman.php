<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table ='peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];

    // public function siswa()
    // {
    //     return $this->belongsTo(Siswa::class, 'siswa_id');
    // }

}
