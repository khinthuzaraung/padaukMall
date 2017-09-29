<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Register extends Model
{
    public static function RegisterCusInfo($name,$gender,$email,$password,$cpassword,$phone,$contact,$termscond)
    {
    	$sql=DB::insert("insert into customer_info(Customer_Name,gender_id,Customer_Email,Password,Confirm_Password,Customer_Phone,Customer_Contact,type_id,Flag,Terms_condition,created_date,updated_date) values ('$name','$gender','$email','$password','$cpassword','$phone','$contact','2','1','$termscond',CURDATE(),CURDATE())");
    }
}
