<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticSection extends Model
{
    protected $fillable = ['name','title','subtitle','content'];
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
