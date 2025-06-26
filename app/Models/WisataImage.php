<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataImage extends Model
{
    protected $fillable = ['wisata_id', 'image_path'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}

