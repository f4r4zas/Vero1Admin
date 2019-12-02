<?php

namespace App\Http\Controllers;

use App\Http\Controllers\common_functions\LocationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use MongoDB\Client;
use Illuminate\Support\Facades\Hash;
use MongoId;

class Users extends Controller{
		
		public function index(){
			
			
		}
	
		function viewProfile(){

		$userData =  Auth::user();

		print_r($userData);

		
		$data = array();

		$locationData = new LocationData();

        $states = $locationData->USStates();

        $data['USStates'] = $states;

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->users;

        $find = array('userEmail'=>$request->input("userEmail"));
        $unique =  $collection->findOne($find);
			
		
		$step = null;
		if($step == null){
            $data["step"] = 0;
            return view("user_profiles_steps/profile-step1",compact("data"));
        }else if($step == 2){
            $data["step"] = 2;
            return view("user_profiles_steps/profile-step1",compact("data"));
        }else if($step == 3){
            $data["step"] = 3;
            return view("user_profiles_steps/profile-step1",compact("data"));
        }else{
            echo "404";
        }
			
			//return view("user_profiles_steps/profile-step1",compact("data"));
		}
		
		function updateProfile(){
			
			//return view();
		}
		
}

?>