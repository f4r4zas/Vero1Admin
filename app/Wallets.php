<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Wallets extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "wallets";
}
