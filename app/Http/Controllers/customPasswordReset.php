<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class customPasswordReset extends Controller
{
    public function sendEmail()
    {
        echo "worked";

        $credentials = ['email' => "vero1_driver@gmail.com"];
        $response = Password::sendResetLink($credentials, function (Message $message) {
            $message->subject($this->getEmailSubject());
            print_r($response);
            die();
        });

        
        
        /*switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }*/
    }
}