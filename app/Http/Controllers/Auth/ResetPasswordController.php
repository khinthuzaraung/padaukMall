<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Passwords\PasswordBroker;
use App\customer_info;
use Mail;
use App\Mail\PasswordResetMail;
use Session;

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

public function typeCode(Request $request){      
       
      $customer_info=new customer_info();
      $email=$request->input('customer_email');
      $customer_code=$request->input('customer_code');
      $resetcode=Session::get('random');
      if($resetcode == $customer_code){
           return redirect()->route('passwordreset');

      }else{
          session::flash('code-error', "Wrong code" );
          return redirect()->route('code');
      }
      
      
}

public function changePassword(Request $request){ 
$this->validate($request,[
        'new_password' => 'required|min:5|max:20',
        'confirm_password' => 'required|min:5|max:20|same:new_password',
         ],[
         'new_password.required' => 'Password is required.',        
         'new_password.min' => 'The Password field must be at least 5 characters.',
         'new_password.max' => 'The Password field may not be greater than 20 characters.',         
         'confirm_password.required' => 'Confirm Password is required.',
         'confirm_password.min' => 'The Password field must be at least 5 characters.',
         'confirm_password.max' => 'The Password field may not be greater than 20 characters.',
         'confirm_password.same' => 'The Password and Confirm Password must match.',
         ]);     
       
      $customer_info=new customer_info();
      $email=$request->input('customer_email');
      $new_password=$request->input('new_password');
      $confirm_password=$request->input('confirm_password');
      $email=Session::get('email');
     // if($cus_email){

          // $customer_info->Password=$new_password;
          // $customer_info->Confirm_Password=$confirm_password;
          // $customer_info->save();
     // } 
     customer_info::where('Customer_Email',$email)->update(['Password'=>$new_password,'Confirm_Password'=>$confirm_password]);   
     // return view('passwordreset');
      
}
}
