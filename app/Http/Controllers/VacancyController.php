<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Country;
use App\Models\VacancyCategory;

class VacancyController extends Controller
{
    public function getAllVacancy(){
    	$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	return view('FindJob' ,  ['vacancies'=>$vacancies->all() , 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
    }


    	public function addVacancyWithCategory(Request $request){
    		
			$vacancy = new Vacancy();
			$vacancy->name = $request->input('vacancy_name');
			$vacancy->requirement = $request->input('requirement');
			$vacancy->salary = $request->input('salary');
			$vacancy->company_id = $request->input('company_id');
			$vacancy->save();
			foreach ($request->input('categories_id') as $value) {
				$category_vacancy= new VacancyCategory;
				$category_vacancy->category_id = $value;
				$category_vacancy->vacancy_id = $vacancy->id;
				$category_vacancy->save();
			}
		return redirect()->route('create-Vacancy');
	}

}
