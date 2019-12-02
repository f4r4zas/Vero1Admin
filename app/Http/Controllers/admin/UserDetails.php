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

class UserDetails extends Controller
{
    public function __construct()
    {

    }

    public function riders()
    {
      $users = Users::where('user_type', 'user')
                ->orderBy('updated_at', 'desc')
                ->get();

      return view("admin.user")->with(['users' => $users, 'type' => 'riders']);
    }

    public function drivers()
    {
      $users = Users::where('user_type', 'driver')
                ->orderBy('updated_at', 'desc')
                ->get();

      return view("admin.user")->with(['users' => $users, 'type' => 'driver']);
    }

    public function details($id)
    {
      $detail_id = base64_decode($id);

      $users = Users::where('_id', $detail_id)
                ->get();

      $driverPurchases = DriverPurchases::where('driver_id', new ObjectId($detail_id))
                ->get();

      $driverRides = [];

      if( count($driverPurchases) > 0)
      {
          foreach($driverPurchases as $key=>$purchases)
          {

            $purchasesItems = Purchases::where('_id', new ObjectId($purchases->purchase_id))->get();
            if(count($purchasesItems) > 0)
            {
              array_push($driverRides, $purchasesItems);
            }
          }

      }

      $data = ['driver'=>$users, 'driver_purchases'=>$driverRides];

      return view('admin.user_details')->with('data', $data);

    }

    public function driverDetails($id)
    {

      $detail_id = base64_decode($id);

      $users = Users::where('_id', $detail_id)
                ->get();

      $driverPurchases = DriverPurchases::where('driver_id', new ObjectId($detail_id))
                ->get();

      $driverRides = [];

      if( count($driverPurchases) > 0)
      {
          foreach($driverPurchases as $key=>$purchases)
          {

            $purchasesItems = Purchases::where('_id', new ObjectId($purchases->purchase_id))->get();
            if(count($purchasesItems) > 0)
            {
              array_push($driverRides, $purchasesItems);
            }
          }

      }

      $data = ['driver'=>$users, 'driver_purchases'=>$driverRides];

      return view('admin.driver_details')->with('data', $data);

    }

    public function approveDriver(Request $request) 
    {

      $requestData = $request->all();

      $detail_id = base64_decode( $requestData['user_detail'] );

      $verificationFlag = $requestData['user_status'];

      $verification = false;

      if($verificationFlag == '1')
      {
        $verification = true;        
      }
      else
      {
        $verification = false; 
      }

      $data = [
                'verified_by_admin' => $verification,
              ];

      $update = Users::where('_id', $detail_id)->update($data);

      if($update)
      {
        $request->session()->flash('success', 'Status Changed Successfully!');
      }
      else
      {
        $request->session()->flash('warning', 'Something Went Wrong. Please Try again Later!'); 
      }

      $users = Users::where('_id', $detail_id)
                ->get();

      $driverPurchases = DriverPurchases::where('driver_id', new ObjectId($detail_id))
                ->get();

      $driverRides = [];

      if( count($driverPurchases) > 0)
      {
          foreach($driverPurchases as $key=>$purchases)
          {

            $purchasesItems = Purchases::where('_id', new ObjectId($purchases->purchase_id))->get();
            if(count($purchasesItems) > 0)
            {
              array_push($driverRides, $purchasesItems);
            }
          }

      }

      $data = ['driver'=>$users, 'driver_purchases'=>$driverRides];


      return Redirect::to('/admin/drivers');
      
    }

    public function settings()
    {
      $adminConfigs = AdminConfigs::orderBy('_id')->get();

      return view('admin.configs')->with('data', $adminConfigs);
    }

    public function updateSettings(Request $request)
    {
        $adminConfigs = AdminConfigs::orderBy('_id')->get();

        if($adminConfigs && count($adminConfigs) > 0)
        {

          $requestData = $request->all();

          $rules = [
            'percent_cost_gallon'           => 'required|numeric|min:0',
            'percent_cost_minutes'          => 'required|numeric|min:0',
            'percent_per_gallon'            => 'required|numeric|min:0',
            'profit_percent_bronze_driver'  => 'required|numeric|min:0|max:1',
            'profit_percent_bronze_admin'   => 'required|numeric|min:0|max:1',
            'profit_percent_silver_driver'  => 'required|numeric|min:0|max:1',
            'profit_percent_silver_admin'   => 'required|numeric|min:0|max:1',
            'profit_percent_gold_driver'    => 'required|numeric|min:0|max:1',
            'profit_percent_gold_driver'    => 'required|numeric|min:0|max:1',
          ];

          $validator = Validator::make(Input::all(), $rules);

          if($validator->fails())
          {
            return Redirect::to('/admin/configs')
  			           ->withErrors($validator);
          }
          else
          {
            $updateId = $adminConfigs[0]->_id;

            $data = [
                      'percent_cost_gallon' => $requestData['percent_cost_gallon'],
                      'percent_cost_minutes' => $requestData['percent_cost_minutes'],
                      'cost_per_gallon' => $requestData['percent_per_gallon'],
                      'profit_percent' => [
                          'bronze' => [
                                        'driver'=> $requestData['profit_percent_bronze_driver'],
                                        'admin' => $requestData['profit_percent_bronze_admin']
                                      ],
                          'silver' => [
                                        'driver'=> $requestData['profit_percent_silver_driver'],
                                        'admin' => $requestData['profit_percent_silver_admin']
                                      ],
                          'gold' => [
                                        'driver'=> $requestData['profit_percent_gold_driver'],
                                        'admin' => $requestData['profit_percent_gold_admin']
                                      ],
                      ]
                    ];

            $update = AdminConfigs::where('_id', $updateId)->update($data);

            if(!$update)
            {
                Redirect::to('/admin/configs');
            }
            else
            {
              $adminConfigs = AdminConfigs::orderBy('_id')->get();

              return view('admin.configs')->with('data', $adminConfigs);
            }
          }

        }
    }

    public function disputes()
    {
      $disputes = Disputes::orderBy('_id')->get();

      return view('admin.disputes')->with('data', $disputes);
    }

    public function disputeDetails($id)
    {
      $disputes = Disputes::where('_id', new ObjectId($id))->get();

      $disputeOrder = [];

      if($disputes && count($disputes) > 0)
      {
        foreach($disputes as $key=>$value)
        {
          $value['order_details'] = Purchases::where('_id', new ObjectId($value->purchase_id))->get();
          $value['user_details'] = Users::where('_id', new ObjectId($value->user_id))->get();

          $disputeOrder[] = $value;
        }
      }

      return view('admin.dispute-details')->with('data', $disputeOrder);
    }

    public function rides()
    {
      return view('admin.rides');
    }

    public function promoCodes()
    {
      return view('admin.rides');
    }
}
