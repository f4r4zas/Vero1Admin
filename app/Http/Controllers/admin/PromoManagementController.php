<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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
use App\Promo;
use Session;

class PromoManagementController extends Controller
{
    public function index(Request $request)
    {
    	$requestData = $request->all();

    	$messages = null;

    	if(!empty($requestData))
    	{
    		$rules = [
            'promo_code'           	=> 'required',
            'discount_type'         => 'required',
            'promo_discount'  		=> 'required|numeric|min:1',
            'promo_start_date'  	=> 'required',
            'promo_end_date'   		=> 'required',
            'promo_on_rides'		=>	'required|numeric|min:0',
          ];

          $validator = Validator::make(Input::all(), $rules, $this->messages());

          

          if($validator->fails())
          {
			$messages = $validator->messages()->all();
          }
          else
          {
          	$messages = $this->storePromoCode($request);
          }
    	}

    	return view('admin.promotion.create')->with(compact("messages"));
    }

    public function promoList()
    {
    	$promoCodes = Promo::all();

    	return view('admin.promotion.list')->with(compact("promoCodes"));
    }

    public function expirePromo(string $id)
    {
    	$id = base64_decode($id);

    	$data = ['is_expire' => true];

    	$promo = Promo::where('_id', new ObjectId($id))->get();

    	if(count($promo) > 0)
    	{

	    	if(Promo::where('_id', $id)->update($data))
	    	{
				Session::flash('success', $promo[0]->promo_code.' Expired Successfully!');
	    	}
	    	else
	    	{
	    		Session::flash('warning', $promo[0]->promo_code.' Not Expired. Something Went Wrong Please Try Again Later');
	    	}
    	}
    	else
    	{
    		Session::flash('warning', 'Invalid details provided no promo code associate with this');
    	}

    	return Redirect::to('/admin/promo-codes');
    }

    public function deletePromo(string $id)
    {
    	$id = base64_decode($id);

    	$promo = Promo::where('_id', new ObjectId($id))->get();

    	if(count($promo) > 0)
    	{

	    	if(Promo::destroy('_id', $id))
	    	{
				Session::flash('success', $promo[0]->promo_code.' Deleted Successfully!');
	    	}
	    	else
	    	{
	    		Session::flash('warning', $promo[0]->promo_code.' Not Delete. Something Went Wrong Please Try Again Later');
	    	}
    	}
    	else
    	{
    		Session::flash('warning', 'Invalid details provided no promo code associate with this');
    	}

    	return Redirect::to('/admin/promo-codes');
    }

    public function editPromo(string $id, Request $request)
    {
    	$id = base64_decode($id);

    	$requestData = $request->all();

    	$messages = null;

    	if(!empty($requestData))
    	{
    		$rules = [
            'promo_code'           	=> 'required',
            'discount_type'         => 'required',
            'promo_discount'  		=> 'required|numeric|min:1',
            'promo_start_date'  	=> 'required',
            'promo_end_date'   		=> 'required',
            'promo_on_rides'		=>	'required|numeric|min:0',
          ];

          $validator = Validator::make(Input::all(), $rules, $this->messages());

          if($validator->fails())
          {
			$messages = $validator->messages()->all();
          }
          else
          {
          	$messages = $this->storePromoCode($request, 'ture', $id);
          }
    	}

    	$promo = Promo::where('_id', new ObjectId($id))->get();

    	return view('admin.promotion.edit')->with(compact('promo', 'messages'));
    }

    private function messages()
    {
    	 return [
	        'promo_code'           	=> '":attribute" must not be empty',
            'discount_type'         => '":attribute" must not be empty',
            'promo_discount'  		=> '":attribute" must not be empty and must be equal to :min',
            'promo_start_date'  	=> '":attribute" must not be empty',
            'promo_end_date'   		=> '":attribute" must not be empty',
            'promo_on_rides'		=>	'":attribute" must no be empty and must be equal to :min',
	    ];
    }

    private function storePromoCode(Request $request, bool $update = false, string $id = null)
    {  	
    	$requestData = $request->all();

    	unset($requestData['_token']);
    	unset($requestData['submit']);

    	$dt = new \DateTime(date('Y-m-d H:i:s'), new \DateTimeZone('UTC'));
		
		$ts = $dt->getTimestamp()*1000;

		$today = new \MongoDB\BSON\UTCDateTime($ts);

		$promoStartDate = new \DateTime($requestData['promo_start_date']);

		$promoSt = $promoStartDate->getTimestamp()*1000;

		$promoStartDate = new \MongoDB\BSON\UTCDateTime($promoSt);


		$promoEndDate = new \DateTime($requestData['promo_end_date']);

		$promoEt = $promoEndDate->getTimestamp()*1000;

		$promoEndDate = new \MongoDB\BSON\UTCDateTime($promoEt);		

    	$requestData['promo_start_date'] = $promoStartDate;

    	$requestData['promo_end_date'] = $promoEndDate;

    	$requestData['created_at'] = $today;

    	$requestData['updated_at'] = $today;

    	$requestData['is_expire'] = false;

    	if($promoStartDate <= $promoEndDate)
    	{

	    	if(!$this->validatePromoCode($requestData['promo_code'], $promoStartDate, $promoEndDate, false))
	    	{

	    		if($update)
	    		{
	    			if($id !== null)
	    			{
	    				if(Promo::where('_id', new ObjectId($id))->update($requestData))
	    				{
	    					return $this->generateMessage(true);
	    				}
	    				else
	    				{
	    					return $this->generateMessage(false, 3);
	    				}
	    			}
	    			else
	    			{
	    				return $this->generateMessage(false, 0);
	    			}
	    		}
	    		else
	    		{
	    			if(Promo::create($requestData))
			    	{
			    		return $this->generateMessage(true);
			    	}
			    	else
			    	{
			    		return $this->generateMessage(false, 3);
			    	}	
	    		}

	    		
	    	}
	    	else
	    	{
	    		return $this->generateMessage(false, 2);
	    	}

    	}
    	else
    	{
    		return $this->generateMessage(false, 1);
    	}

    }

    /**
    * reason will be 1 for start date is greater than end date, 2 for promo code is already exists with the same name in the same
    * time slot, 3 for data could not store please try again later, 0 for defualt, something went wrong please try again later
    */

    private function generateMessage(bool $flag, int $reason = 0)
    {
    	$messageArray = [];

    	if($flag)
    	{
    		$messageArray = ['success' => 'Data Stored Successfully'];
    	}
    	else
    	{
    		switch ($reason) {
    			case '0':
    				$messageArray = ['0' => 'something went wrong please try again later'];
    				break;

				case '1':
    				$messageArray = ['0' => 'start date must not greater than end date'];
    				break;

				case '2':
    				$messageArray = ['0' => 'promo code is already exists with the same name in the same time slot'];
    				break;

				case '3':
    				$messageArray = ['0' => 'data could not store please try again later'];
    				break;
    			
    			default:
    				$messageArray = ['0' => 'something went wrong please try again later'];
    				break;
    		}
    	}

    	return $messageArray;
    }

    private function validatePromoCode(string $promoName, object $promoStartDate, object $promoEndDate, bool $checkValidation = true)
    {

    	if($checkValidation)
    	{
    		$promo = Promo::where('promo_code', '=', $promoName)->get();

	    	if(count($promo) > 0)
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}	
    	}
    	else
    	{
    		return false;
    	}

    	
    }
}
