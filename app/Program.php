<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $connection = "pgsql2";

    public function first_letter(){
        return strtolower(substr($this->name,0,1));
    }
}
