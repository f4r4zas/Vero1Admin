<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class VerificationCodes extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "verificationcodes";
}
