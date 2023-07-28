<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeliharaanAset extends Model
{
    use HasFactory;
    protected $table = 'pemeliharaanaset';

    protected $fillable = [
        'id_daftaraset',
        'hasil_pemeliharaan',
        'biaya_pemeliharaan',
        'tgl_penjadwalan',
        'tgl_pemeliharaan',
        'slug'
    ];

    protected $hidden = [];

    public function daftaraset()
    {
        return $this->belongsTo(DaftarAset::class, 'id_daftaraset', 'id');
    }
}
