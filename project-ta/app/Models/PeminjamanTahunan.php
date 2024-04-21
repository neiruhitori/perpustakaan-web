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
}

