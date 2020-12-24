<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'companies';


    public function vacancies(){

		return $this->hasMany(Vacancy::class);
	}

    public function country(){
    	return $this->belongsTo('App\Models\Country');
    }
}
