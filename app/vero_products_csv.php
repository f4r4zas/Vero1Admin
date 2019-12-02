<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class vero_products_csv extends Eloquent
{
    protected $connection = "mongodb";
    //protected $collection = "vero_products";
	protected $collection = "products";
//	protected $fillable = ["entered_store_name","entered_store_cat","s.no","main_category","sub_category","name","small_description","size","weight","price","image_url","description","second_last","last"];
	/**
	* Disable all mass assignable restrictions.
	*
	* @param  bool  $state
	* @return void
	*/
	public static function unguard($state = true)
	{
		static::$unguarded = $state;
	}
}
