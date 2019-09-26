<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $casts = [
        'cover_image' => 'array',
    ];

    protected $fillable = ['cover_image'];
}
