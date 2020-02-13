<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // default values
    protected $attributes = [
        'reviews' => 0,
    ];
}
