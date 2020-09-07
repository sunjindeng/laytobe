<?php

namespace App\Models;



class Videos extends Model
{
    public function channels(){
        return $this->belongsTo(Channels::class);
    }
}
