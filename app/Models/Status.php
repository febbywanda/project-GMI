<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';

    protected $fillable = [
        'nama_status',
        'slug'
    ];

    protected $hidden = [];

    public function Daftaraset()
    {
        return $this->hasMany(Daftaraset::class, 'id_merk', 'id');
    }
}
