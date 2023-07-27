<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayatharian extends Model
{
    use HasFactory;

    protected $table = 'ayatharians';

    protected $fillable = [
        'hari',
        'tanggal',
        'ayat',
    ];

    public function getTanggalAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
