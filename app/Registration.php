<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Registration extends Eloquent
{

   protected $connection = 'mongodb';

    protected $fillable = ['name'];


}
