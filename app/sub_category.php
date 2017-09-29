<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
	public function subMenu()
	{
		return $this->hasMany(sub_category::class);
	}
    
}
    
    class sub_category1 extends Model
    {
    	
    	public function menu()
    	{
    		return $this->belongsTo(category::class);
    	}
    }

    public function menu()
{
    $menu = Menu::all()->load('subMenu');

    return view('category.show.menu',compact('menu'));
}
    

