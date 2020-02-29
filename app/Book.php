<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['slug','title','author','total','available'];

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
