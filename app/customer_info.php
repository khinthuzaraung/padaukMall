<?php namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;



class customer_info extends Authenticatable {

    const CREATED_AT = 'created_date';
	const UPDATED_AT = 'updated_date';
    protected $table = 'customer_info';
    
    protected $fillable=['Customer_Name','gender_id','Customer_Email','Password','Confirm_Password','Customer_Phone','Customer_Contact','type_id','Flag','Terms_condition'];

}