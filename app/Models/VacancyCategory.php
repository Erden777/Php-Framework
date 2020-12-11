<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
	public $timestamps = false;
    use HasFactory;
    protected $table = 'category_vacancy';

    public function category(){
    	return $this->belongsTo('App\Models\JobCategory');
    }

     public function vacancy(){
    	return $this->belongsTo('App\Models\Vacancy');
    }
}
