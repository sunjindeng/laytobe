<?php

namespace App;

use App\Model;

class Channels extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }
}
