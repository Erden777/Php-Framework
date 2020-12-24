<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    public function Company(){
    	return $this->belongsTo('App\Models\Company');
    }

     public function category(){
        return $this->hasMany('App\Models\VacancyCategory');
    }
}
