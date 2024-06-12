<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukusharian extends Model
{
    use HasFactory;

    protected $table ='bukusharians';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];
}
