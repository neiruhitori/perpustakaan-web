<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanTahunan extends Model
{
    use HasFactory;
    protected $table ='peminjamantahunan';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'peminjamantahunan_id');
    }

    // public function siswa()
    // {
    //     return $this->belongsTo(Siswa::class, 'siswa_id');
    // }
}

