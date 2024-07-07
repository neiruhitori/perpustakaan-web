<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table ='peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];
    // Dibawah ini adalah untuk merubah text menjadi red ketika melebihi tanggal
    protected $appends = ['is_overdue'];

    public function siswas()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Dibawah ini adalah untuk merubah text menjadi red ketika melebihi tanggal
    public function getIsOverdueAttribute()
    {
        return Carbon::now()->gt(Carbon::parse($this->jam_kembali)) && $this->status != 0;
    }

}
