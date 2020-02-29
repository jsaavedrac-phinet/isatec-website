<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = "pgsql2";
    protected $fillable = ['name','lastname','mothers_lastname','email','type_phone','phone','sex','turn_id','program_id','type_identification','identification_number'];
}
