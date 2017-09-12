<?php namespace App;

//use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;



class customer_info extends Authenticatable {

    
    protected $table = 'customer_info';
    
    protected $fillable=['Customer_Name','Customer_Email','Password','Confirm_Password','Customer_Phone','Customer_Contact','Flag'];


    //Validation Rules and Validator Function
    public static function validator($input){

        $rules = array(
            'email'    =>'required|email'
        );

        return Validator::make($input,$rules);
    }

}