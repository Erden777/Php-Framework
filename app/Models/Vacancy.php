<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    public function getCompany(){
    	return $this->belongsTo('App\Models\Company' , 'companies');
    }

     public function categories(){
        return $this->belongsToMany('App\Models\JoCcategory', 'category_vacancy');
    }
}
