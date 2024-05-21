<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table ='bukus';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];

    public function peminjamantahunan()
    {
        return $this->belongsTo(PeminjamanTahunan::class, 'peminjamantahunan_id');
    }
}
