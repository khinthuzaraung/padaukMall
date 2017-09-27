<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{

    //
    public function doLogout(request $request){
    	session()->forget('CustomerName');
    	return redirect()->route('login');
    	
    }
}
