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
        Auth::logout();//logging out user
        return redirect::to($redirectTo);
    }

    public function doLogin()
    {
         $rules=array('email' =>'required|email' ,
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
                }
    }
            
  
}


