<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['date','title','subtitle','content'];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function monthAndYear(){
        setlocale(LC_TIME, 'es_ES.UTF-8');

        $cambio = \DateTime::createFromFormat('Y-m-d H:i:s', $this->date)->format('Y/m/d H:i:s');
        $nueva_fecha = strftime("%B, %G", strtotime($cambio));
        return $nueva_fecha;
    }

    public function day(){
        $cambio = \DateTime::createFromFormat('Y-m-d H:i:s', $this->date)->format('Y/m/d H:i:s');
        $nueva_fecha = strftime("%d", strtotime($cambio));
        return $nueva_fecha;
    }

    public function carbonDate($date){
        $new_date = \DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('Y/m/d H:i:s');
        $new_date = strftime("%d %h %H:%M", strtotime($new_date));

        return $new_date;
    }
}
