<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;

    protected $table = 'sektor';

    protected $fillable = [
        'nama_sektor',
        'tanggal',
        'keluarga',
        'alamat',
        'slug'
    ];

    protected $hidden = [];

    
}
