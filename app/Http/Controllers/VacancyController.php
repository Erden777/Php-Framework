<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Country;

class VacancyController extends Controller
{
    public function getAllVacancy(){
    	$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	return view('FindJob' ,  ['vacancies'=>$vacancies->all() , 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
    }
}
