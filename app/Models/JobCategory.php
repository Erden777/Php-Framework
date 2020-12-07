<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table ='job_categories';


    public function vacancies()
    {
        return $this->belongsToMany('App\Models\Vacancy', 'category_vacancy');
    }
}
