<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenghapusanAset extends Model
{
    use HasFactory;
    protected $table = 'penghapusanaset';

    protected $fillable = [
        'tgl_usulan',
        'ket_penghapusan',
        'hasil_approval',
        'tgl_pemeliharaan',
        'tgl_approval',
        'status_usulan',
        'slug'
    ];

    protected $hidden = [];

    public function penghapusanaset()
    {
        return $this->belongsTo(PenghapusanAsetAset::class, 'tgl_pemeliharaan', 'tgl_pemeliharaan');
    }
}
