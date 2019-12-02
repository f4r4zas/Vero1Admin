<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AdminConfigs extends Eloquent
{
  protected $connection = "mongodb";
  protected $collection = "adminconfigs";
}
