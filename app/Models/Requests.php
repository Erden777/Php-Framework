<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model{

	use HasFactory;
	
	protected $table = 'requests';

	public function users(){

		return $this->belongsToMany('App\Models\User' , 'requests' , 'user_id');
	}


	public function user(){
		return $this->belongsTo('App\Models\User');
	}

	public function vacancy(){
		return $this->belongsTo('App\Models\Vacancy');	
	}
	public function reqUser(){
	
		$user =User::find($this->user_id);
		return $user;
	}

	public function reqVacancy(){
	
		$vacacy =Vacancy::find($this->vacancy_id);
		return $vacacy;
	}

	public function vacancies(){
		return  $this->belongsToMany('App\Models\Vacancy');
	}
}
