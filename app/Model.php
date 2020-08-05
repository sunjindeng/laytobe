<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    //取消自增
    public $incrementing = false;
    protected $guarded = [];
    protected  static function boot(){
        parent::boot();
        static::creating(function ($model){
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
}
