<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;



class Pricing extends Controller
{

	function index(){
		echo "worked";
	}


		function calculatePricing(Request $request){

		$curl = curl_init();
		$api_key = "$2a$10$8C.E5netWMZK5xKIm1OsYOhNyXbnE6qr4SFN6Ibt/7RXwVDfaU9NG";

		$api = array(
		"is_estimated" => 1,
		"miles" => 4,
		"minutes" => 10
		);

		$miles = $request->post("distance");
		$minutes = $request->post("duration");	

		  curl_setopt_array($curl, array(
		  CURLOPT_PORT => "3000",
		  CURLOPT_URL => "http://ec2-54-174-240-101.compute-1.amazonaws.com:3000/purchase/calculate-fare",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"purchase_id\":\"5b5c6270d566a31548231fd2\",\"is_estimated\":1,\"miles\":$miles,\"minutes\":$minutes}",
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer $api_key",
		    "Content-Type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}


	}

}

 ?>