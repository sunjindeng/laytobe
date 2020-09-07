<?php

namespace App\Models;

use App\Http\Controllers\SubscriptionController;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channels extends Model implements HasMedia
{
    use HasMediaTrait;
    public function User(){
        return $this->belongsTo(User::class);
    }
    //获取缩略图
    public function image(){
        if($this->media->first()){
            return $this->media->first()->getFullUrl('thumb');
        }else{
            return null;
        }
    }
    //验证编辑权限
    public function editable(){
        if(!auth()->check()) return false;
        return $this->user_id === auth()->user()->id;
    }
    //生成缩略图
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width('100')->height('100');
    }

    public static function last(){
        return static::all()->last();
    }
    public function subscriptions(){
        return $this->hasMany(Subscription::class);

    }
    public function videos(){
        return $this->hasMany(Videos::class);
    }
}
