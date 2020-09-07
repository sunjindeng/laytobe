<?php

namespace App\Models;


class Subscription extends Model
{
    public function Channels(){
        return $this->hasMany(Channels::class);
    }
}
