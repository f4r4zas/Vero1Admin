<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Disputes extends Eloquent
{
  protected $connection = "mongodb";
  protected $collection = "disputes";

  protected $fillable = array('_id', 'user_id', 'purchase_id');
}
