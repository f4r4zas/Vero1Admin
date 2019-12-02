<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DriverPurchases extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "driverhaspurchases";

    protected $fillable = array('_id', 'driver_id', 'purchase_id');
}
