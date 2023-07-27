<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidio extends Model
{
    use HasFactory;

    protected $table = 'vidio';

    protected $fillable = [
        'judul',
        'link',
        'gambar',
    ];

    public function getGambar()
    {
        if (!$this->gambar) {
            return asset('images/default.jpg');
        }

        return asset('uploads/' . $this->gambar);
    }
}
