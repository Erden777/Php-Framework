<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm_Requests extends Model
{
    use HasFactory;
    protected $table = 'confirm__requests';

	public function user(){
		
		return $this->belongsTo('App\Models\User');
	}


	public function company(){

		return $this->belongsTo('App\Models\Company');
	}


	public function vacancy(){

		return $this->belongsTo('App\Models\Vacancy');
	}



}
