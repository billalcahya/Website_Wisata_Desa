<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'alamat',
        'jadwal_buka',
    ];

    protected $casts = [
        'jadwal_buka' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(WisataImage::class);
    }
}
