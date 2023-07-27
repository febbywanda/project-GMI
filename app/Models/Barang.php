<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $fillable = [
        'id_merk',
        'id_golongan',
        'nama_barang',
        'status_barang',
        'slug'
    ];

    protected $hidden = [];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }
}
