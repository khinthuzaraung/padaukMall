<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	public function subMenu()
	{
		return $this->hasMany(sub_category::class);
	}
    
}