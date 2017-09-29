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
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Register;


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

   
    public function GetGender()
    {
        $gender = DB::table('gender')->get();
        return View::make("pages.register")->with('gender',$gender);
       
    }

    public function formValidationPost(Request $request)
    {   

        $this->validate($request,[
        'customer_name' => 'required|min:5|max:35',
        'gender' => 'required',
        'customer_email' => 'required|email|unique:customer_info',
        'customer_password' => 'required|min:8|max:20',
        'customer_cpassword' => 'required|min:8|max:20|same:customer_password',
        'customer_phone' => 'required',
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
         'customer_password.min' => 'The Password field must be at least 8 characters.',
         'customer_password.max' => 'The Password field may not be greater than 20 characters.',         
         'customer_cpassword.required' => 'Confirm Password is required.',
         'customer_cpassword.min' => 'The Password field must be at least 8 characters.',
         'customer_cpassword.max' => 'The Password field may not be greater than 20 characters.',
         'customer_cpassword.same' => 'The Password and Confirm Password must match.',
         'customer_phone.required' => 'Invalid Phone Number.',
         'customer_contact.required' => 'Address is required.',
         'checkbox.required'=>'Please accept our Terms and Conditons.'
         ]);
    }

    public function DoRegister(Request $request)
    {
        $this->formValidationPost($request);

        Register::RegisterCusInfo(
                $request->input('customer_name'),
                $request->input('gender'),
                $request->input('customer_email'),
                Hash::make($request->input('customer_password')),
                Hash::make($request->input('customer_cpassword')),
                $request->input('customer_phone'),
                $request->input('customer_contact'),
                $request->input('checkbox')
                );
        //Email send process
        $To_email=Session::put('email',$request->input('customer_email'));
         Mail::send('emails.WelcomeMail',
            array(
                'name' => $request->input('customer_name'),
                'email' => $request->input('customer_email'),
                'phone' => $request->input('customer_phone')
            ), function($message)
        {
            $email=Session::get('email');
            $message->to($email, 'ool')->subject('Test');
            Session::flush('email');
        });
        return redirect()->route('login'); 
    }
    
}
    

