<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\customer_info;
use DB;
use Illuminate\Support\Facades\Input;
use Session;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'customer_email' => 'required|email|max:255|unique:customer_info',
            'customer_password' => 'required|min:6|confirmed',
        ]);
    }
   
    public function postLogin(request $request)
    {
   
    }

    public function doLogin(request $request)
    {
         $this->validate($request,[
            'customer_email' => 'required|email',
            'customer_password' => 'required',
        ],[
            'customer_email.required' => 'Email is required.',  
            'customer_password.required' => 'Password is required.', 
           
        ]);
        $customer_info=new customer_info();
        $email=$request->input('customer_email');
        $password=$request->input('customer_password');
        //$customer_info=Customer_info::where('Customer_Email',$email)->first();
        $customer_info=DB::table('customer_info')
                        ->where('Customer_Email','=',$email)
                        ->where('Password','=',$password)
                        ->first();
        if($customer_info){           
            session([
                'Customer_Email'=>$request->get('customer_email')
                ]);
       return redirect()->route('login');
        }else{
            session::flash('message-login', "Invalid Email or Password , Please try again." );
            return redirect()->route('login');
       
                
        }
    }
            
  
}


