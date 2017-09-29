<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;



class CategoryController extends Controller
{
    public function categoryData()
    {
    	
        $category = DB::table('category')
        // ->join('sub_category','category.Category_id','=','sub_category.parent_id')
        ->get();
        return View::make("pages.sidebar")->with('category',$category);
       
    }


   
}