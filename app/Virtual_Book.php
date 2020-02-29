<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virtual_Book extends Model
{
    protected $fillable = ['slug','title','author','downloads','year','collection','content','url'];
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
