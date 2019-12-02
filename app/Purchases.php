<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Purchases extends Eloquent
{
    protected $connection = "mongodb";
    protected $collection = "purchases";

    protected $primarykey = "_id";

 	protected $guarded = [];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

	protected $fillable = [
        'user_id', '_id'
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function users()
    {
      return $this->belongsTo('App\Users', 'user_id');
    }
}
