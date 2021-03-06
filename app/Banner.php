<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['name','content'];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

}
