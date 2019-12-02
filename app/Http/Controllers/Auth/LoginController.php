<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticateAdmin(Request $request)
    {

        $messages = [
                        "email.required"    => "Email is required",
                        "email.email"       => "Email is not valid",
                        "user.exists"      => "Email doesn't exists in user table",
                        "password.required" => "Password is required",
                        "password.min"      => "Password must be at least 6 characters",
        ];

         $validator = Validator::make(
                    $request->all(), 
                    [
                        'email' => 'required|email|exists:users',
                        'password' => 'required|min:6'
                    ],

                    $messages);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        else {

            $credentials = $request->only('email', 'password');

            $urlDetails = 'http://ec2-35-174-109-111.compute-1.amazonaws.com:3000/login';
    
            $url = $urlDetails;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credentials));
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            $urlData = curl_exec($curl);
            curl_close($curl);
    
            $returnData = json_decode($urlData);
    
            if( isset($returnData->status) && $returnData->status == true){
                //User Exists Log in..
                $loginUser = Auth::loginUsingId($returnData->data->_id, true);
                return redirect()->intended($this->redirectPath());
    
            }else {
                    
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'approve' => 'Wrong password or this account not approved yet.',
                ]);

            }
          

        }///else
       
    }
    
    public function driverLoginForm()
    {
        return view('driver.login');
    }
    
    public function authenticateDriver(Request $request)
    {
        $messages = [
                        "email.required"    => "Email is required",
                        "email.email"       => "Email is not valid",
                        "users.exists"      => "Email doesn't exists in users table",
                        "password.required" => "Password is required",
                        "password.min"      => "Password must be at least 6 characters",
        ];

         $validator = Validator::make(
                    $request->all(), 
                    [
                        'email' => 'required|email|exists:users',
                        'password' => 'required|min:6'
                    ],

                    $messages);

        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        else {

                $credentials = $request->only('email', 'password');
                
                 Auth::shouldUse('user_driver');
                
               if (Auth::attempt($credentials)) {
                   
                   return redirect()->intended('driver');

                } else {
                    
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                        'approve' => 'Wrong password or this account not approved yet.',
                    ]);

                }

        }
    }
    
}
