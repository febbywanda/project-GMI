<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendeta extends Model
{
    use HasFactory;

    protected $table = 'pendeta';

    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'masa_jabatan'
    ];
}
