<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PurchasesFlows extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "purchasesflows";
}
