<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'companies';


    public function getVacancy(){
    	return $this->belongsToMany('App\Models\Vacancy' , 'vacancies');
    }

    public function country(){
    	return $this->belongsTo('App\Models\Country');
    }
}
