<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beritajemaat extends Model
{
    use HasFactory;

    protected $table = 'beritajemaat';

    protected $fillable = [
        'judul',
        'slug',
        'author',
        'deskripsi'
    ];

    protected $hidden = [];
}
