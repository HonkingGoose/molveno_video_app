<?php

namespace App;
use App\Video;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function videos()
    {
        return $this->hasMany(\App\Video::class);
    }
}
