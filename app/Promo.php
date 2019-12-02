<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Promo extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'promos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_expire', 'promo_code', 'promo_discount', 'discount_type', 'created_at', 'updated_at', 'promo_start_date', 
        'promo_end_date', 'promo_on_rides'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '_id'
    ];
}
