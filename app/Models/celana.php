<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class celana extends Model
{
    use HasFactory;
    protected $table = "celana";
    protected $fillable = ['merk', 'ukuran', 'panjang_cm'];
}
