<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Passwords\PasswordBroker;
use App\customer_info;
use Mail;
use App\Mail\MyTestMail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function postEmail(Request $request)
{
    $this->validate($request,[
            'customer_email' => 'required|email',
            ],[
            'customer_email.required' => 'Email is required.',  
        ]);
        $customer_info=new customer_info();
        $email=$request->input('customer_email');
     $to_email = $email;
     var_dump($to_email);
        Mail::to($to_email)->send(new MyTestMail);
        return "E-mail has been sent Successfully";  
    
}
}
