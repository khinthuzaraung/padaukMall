<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\customer_info;
use Mail;
use App\Mail\PasswordResetMail;
use Session;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
     public function getEmail(Request $request){
   
          return view('forgot');
      }
       
     
    

     public function postEmail(Request $request){
        $this->validate($request,[
            'customer_email' => 'required|email',
            ],[
            'customer_email.required' => 'Email is required.',  
        ]);
        $customer_info=new customer_info();
        $email=$request->input('customer_email');
        Session::put('email',$email);
        $db_email=customer_info::where('Customer_Email',$email)->first();
        Session::put('cus_email',$db_email);
        $cus_email=Session::get('cus_email');
        if(empty($cus_email)){
           session::flash('email-error',"Your email doesn't exist.Please type correctly..........");
           return redirect()->route('forgot');
        }else{
           $to_email = $email;
           Mail::to($to_email)->send(new PasswordResetMail);
           return redirect()->route('code');
        }
}

      public function resetPassword(Request $request){
      
      //$random=rand(6,'1234567890');
      //$customer_info->save();
      $customer_info=new customer_info();
      $email=$request->input('customer_email');
      $customer_code=$request->input('customer_code');
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $pin = mt_rand(10, 99). mt_rand(10, 99). $characters[rand(0, strlen($characters) - 1)];
      $string = str_shuffle($pin);
      Session::put('random',$string);
      $resetcode=Session::get('random');   
      var_dump($resetcode);         
      return view('code');

}

}
