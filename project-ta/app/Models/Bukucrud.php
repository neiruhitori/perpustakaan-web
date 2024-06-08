<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukucrud extends Model
{
    use HasFactory;
    protected $table ='bukucruds';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $guarded = [];
}
