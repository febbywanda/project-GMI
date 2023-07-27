<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    protected $table = 'merk';

    protected $fillable = [
        'nama_ruangan',
        'kode_ruangan',
        'status_ruangan',
        'slug'
    ];

    protected $hidden = [];

    public function Barang()
    {
        return $this->hasMany(Barang::class, 'id_merk', 'id');
    }
    public function Daftaraset()
    {
        return $this->hasMany(Daftaraset::class, 'id_merk', 'id');
    }
}
