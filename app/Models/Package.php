<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'type',          
        'title',
        'description',
        'price',
        'image',
    ];
}
