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
            'password' => 'required|min:6|confirmed',
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
        return view('register');
    }

    public function formValidationPost(request $request)
    {
        $this->validate($request,[
        'customer_name' => 'required|min:5|max:35',
        'customer_email' => 'required|email|unique:customer_info',
        'customer_password' => 'required|min:5|max:20',
        'customer_cpassword' => 'required|min:5|max:20|same:customer_password',
        'customer_phone' => 'required|numeric',
        'customer_contact' => 'required'
         ],[
         'customer_name.required' => 'Name is required.',
         'customer_name.min' => 'The Name field must be at least 5 characters.',
         'customer_name.max' => 'The Name field may not be greater than 35 characters.',  
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
         ]);
        $name=$request->input('customer_name');
        $email=$request->input('customer_email');
        $password=$request->input('customer_password');
        $cpassword=$request->input('customer_cpassword');
        $phone=$request->input('customer_phone');
        $contact=$request->input('customer_contact');
        $customer_info=new customer_info;
        $customer_info->Customer_Name=$name;
        $customer_info->Customer_Email=$email;
        $customer_info->Password=$password;
        $customer_info->Confirm_Password=$cpassword;
        $customer_info->Customer_Phone=$phone;
        $customer_info->Customer_Contact=$contact;
        $customer_info->Flag=1;
        $customer_info->save();
        return redirect()->route('login');
        dd('You are successfully added all fields.');

    }

   
}
