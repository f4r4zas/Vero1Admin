<?php

namespace App;

use App\Purchases;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;
    
    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $primarykey = "_id";

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stripe_id', 'mmobile_number', 'phone_number', 'is_online',
        'is_verified', 'first_name', 'last_name', 'gender', 'street_address',
        'city', 'state', 'country', 'zip', 'email', 'password', 'user_type',
        'created_at', 'updated_at', 'api_key', '__v', '_id', 'driver_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_key', '__v', 'password', 'stripe_id'
    ];

    public function purchases()
    {
      return $this->hasMany('App\Purchases', '_id', 'user_id');
    }
}
