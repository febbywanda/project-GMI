<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAset extends Model
{
    use HasFactory;
    protected $table = 'daftaraset';

    protected $fillable = [
        'id_merk',
        'id_ruangan',
        'id_barang',
        'id_golongan',
        'id_status',
        'nama_aset',
        'kode_aset',
        'harga_pembelian',
        'tgl_pembelian',
        'masa_manfaat',
        'nilai_redusi',
        'status_aset',
        'slug'
    ];

    protected $hidden = [];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
