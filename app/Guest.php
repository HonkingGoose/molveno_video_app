<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function generateUserHash()
    {
        return hash("sha256", $this->id . $this->salt);
    }
}
