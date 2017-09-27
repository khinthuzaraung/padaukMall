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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Session;
use Auth;
use redirect;

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

    
    public function doLogout()
    {

        /*Auth::logout();//logging out user
        return redirect::to($redirectTo);*/

       return view('pages.login');

    }

    public function doLogin()
    {

        /* $rules=array('email' =>'required|email' ,
                      'password' => 'required|alphaNum|min:8');
         $Validator=Validator::make(Input::all(),$rules);
                    if ($validator->fails())
                {
                return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                }
              else
                {
 
                // create our user data for the authentication
 
                $userdata = array(
                    'email' => Input::get('email') ,
                    'password' => Input::get('password')
                );
 
                // attempt to do the login
 
                if (Auth::attempt($userdata))
                    {
 
                    // validation successful
                    // do whatever you want on success
                        return Redirect::to('index');
 
                    }
                  else
                    {
 
                    // validation not successful, send back to form
 
                    return Redirect::to('checklogin');
                    }
                }*/

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
       
        $customer_info=Customer_info::where('Customer_Email',$email)->first();
        $customer_info=DB::table('customer_info')
                        ->where('Customer_Email','=',$email)
                        //->where('Password','=',$password)
                        ->first();

         
        if($customer_info && Hash::check($password,$customer_info->Password)) {
   
        
           Session::put('CustomerName',$customer_info->Customer_Name);
            
     
            return view('pages.index');
        
        }else{
           
            session::flash('message-login', "Invalid Email or Password , Please try again." );
            return redirect()->route('login');
       
                
        }

    }
            
  
}


