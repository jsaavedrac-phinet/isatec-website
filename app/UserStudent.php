<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStudent extends Model
{
    protected $connection = "pgsql2";
    protected $table = 'users';
}
