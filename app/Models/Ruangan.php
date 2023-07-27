<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';

    protected $fillable = [
        'nama_merk',
        'status_ruangan',
        'slug'
    ];

    protected $hidden = [];

    public function Daftaraset()
    {
        return $this->hasMany(Daftaraset::class, 'id_ruangan', 'id');
    }
}
