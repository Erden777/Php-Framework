<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	use HasFactory;

	public function users(){

		return $this->belongsToMany('App\Models\Users');
	}
	
	public function vacancies(){

		return  $this->belongsToMany('App\Models\Vacancy');
	}
}
