<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class FeedBacks extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "feedbacks";
}
