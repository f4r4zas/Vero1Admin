<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use DB;
use App\Users;
use App\Logs;
use App\Wallets;
use App\FeedBacks;
use App\Purchases;
use App\DriverPurchases;
use App\PurchasesFlows;
use App\AdminConfigs;
use MongoDB\BSON\ObjectId;
use Validator;
use Redirect;
use App\Disputes;

class RidesController extends Controller
{
    public function pickupService()
    {
    	$purchases = Purchases::where('service_type', 'pick_up')
				    	->orderBy('updated_at', 'desc')
						->get();

		
		return view('admin.rides.pickup')->with(compact('purchases'));
    }
}
