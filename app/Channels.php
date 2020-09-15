<?php

namespace App;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channels extends Model implements HasMedia
{
    use HasMediaTrait;
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null)
    {
        // TODO: Implement registerMediaConversions() method.
        $this->addMediaConversion('thumb')->width('100')->height('100');
    }
}
