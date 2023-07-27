<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'golongan';

    protected $fillable = [
        'nama_golongan',
        'kode_golongan',
        'status_golongan',
        'slug'
    ];

    protected $hidden = [];

public function Barang()
    {
        return $this->hasMany(Barang::class, 'id_golongan', 'id');
    }
    public function Daftaraset()
    {
        return $this->hasMany(Daftaraset::class, 'id_golongan', 'id');
    }
}
