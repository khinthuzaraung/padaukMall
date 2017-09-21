<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\customer_info;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Mail;
use DB;
use View;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function formValidation()
    {
        $gender = DB::table('gender')->get();
        return View::make("pages.register")->with('gender',$gender);
       // return view('register');
    }

    public function formValidationPost(request $request)
    {   

        $this->validate($request,[
        'customer_name' => 'required|min:5|max:35',
        'gender' => 'required',
        'customer_email' => 'required|email|unique:customer_info',
        'customer_password' => 'required|min:8|max:20',
        'customer_cpassword' => 'required|min:8|max:20|same:customer_password',
        'customer_phone' => 'required|int',
        'customer_contact' => 'required',
        'checkbox'=>'required',
         ],[
         'customer_name.required' => 'Name is required.',
         'customer_name.min' => 'The Name field must be at least 5 characters.',
         'customer_name.max' => 'The Name field may not be greater than 35 characters.',  
         'gender.required' => 'Gender is required',
         'customer_email.required' => 'Email is required.',      
         'customer_email.unique' => 'Your email has already existed.', 
         'customer_password.required' => 'Password is required.',        
         'customer_password.min' => 'The Password field must be at least 5 characters.',
         'customer_password.max' => 'The Password field may not be greater than 20 characters.',         
         'customer_cpassword.required' => 'Confirm Password is required.',
         'customer_cpassword.min' => 'The Password field must be at least 5 characters.',
         'customer_cpassword.max' => 'The Password field may not be greater than 20 characters.',
         'customer_cpassword.same' => 'The Password and Confirm Password must match.',
         'customer_phone.required' => 'Phone Number is required.',
         'customer_phone.numeric' => 'Invalid Phone Number.',
         'customer_contact.required' => 'Address is required.',
         'checkbox.required'=>'Please Read Teams and Conditons.'
         ]);

        $name=$request->input('customer_name');
        Session::put('welcome-name',$name);
        $gender=$request->input('gender');
        $email=$request->input('customer_email');
        Session::put('welcome-mail',$email);
        $password=Hash::make($request->input('customer_password'));
        $cpassword=Hash::make($request->input('customer_cpassword'));
        $phone=$request->input('customer_phone');
        $contact=$request->input('customer_contact');
        $termscond=$request->input('checkbox');
        $customer_info=new customer_info;
        $customer_info->Customer_Name=$name;
        $customer_info->gender_id=$gender;
        $customer_info->Customer_Email=$email;
        $customer_info->Password=$password;
        $customer_info->Confirm_Password=$cpassword;
        $customer_info->Customer_Phone=$phone;
        $customer_info->Customer_Contact=$contact;
        $customer_info->type_id=2;
        $customer_info->Flag=1;
        $customer_info->Terms_condition= $termscond;
        $customer_info->save();
        return redirect()->route('welcome-mail');
        dd('You are successfully added all fields.');
        
    }
    
      public function welcomeMail(request $request)
    {
        $to_email = Session::get('welcome-mail');
        Mail::to($to_email)->send(new WelcomeMail);
        return redirect()->route('login');
        dd("Email has been sent Successfully");  
    }

   
     }
    

