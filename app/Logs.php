<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Logs extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "logs";
}
