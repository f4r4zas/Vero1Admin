<?php

namespace App\Http\Controllers\driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Support\Facades\Redirect;
use App\Users;
use App\Http\Requests\changePassword;

class DriverController extends Controller
{
    public function index()
    {
        //return view("admin.dashboard");
        return view("adminnew.index");        
    }
    
    public function configs()
    {   
        return view('adminnew.driver.configs');
        //return view("driver.configs");
    }
    
    public function changePassword(changePassword $request)
    {
        dd($request->input());
        $validated = $request->validated();
        dd($validated);

        if($request->input('current_password') !== null && $request->input('password') !== null && $request->input('password_confirmation') !== null )
        {
            
            if(Auth::Check())
            {
              $request_data = $request->All();
              $validator = $this->driverCredentialRules($request_data);
              
              if($validator->fails())
              {
                return Redirect::back()->withErrors($validator);
              }
              else
              {  
                $current_password = Auth::User()->password;
                
                if(Hash::check($request_data['current_password'], $current_password))
                {           
                    $user_id = Auth::User()->id;                       
                    $obj_user = Users::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    
                    return redirect()->to('/driver/configs');
                }
                else
                {           
                  $error = array('current_password' => 'Please enter correct current password');
                   return Redirect::back()->withErrors($error);
                }
              }        
            }
            else
            {
              return redirect()->to('/driver/configs');
            }  
            
        }
        else
        {
            return view("driver.change_password");
        }
    }
    
    public function stripeConnect()
    {
        return view("driver.stripe");
    }
    
    public function driverCredentialRules(array $data)
    {
      $messages = [
        'current_password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current_password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }  
}
