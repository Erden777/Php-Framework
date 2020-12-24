<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Company;
use App\Models\Country;
use App\Models\VacancyCategory;
use App\Models\JobCategory;
use DB;
use App\Models\Requests;
use App\Models\Confirm_Requests;

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
			if($request->input('categories_id')!=null){
			foreach ($request->input('categories_id') as $value) {
				$category_vacancy= new VacancyCategory;
				$category_vacancy->category_id = $value;
				$category_vacancy->vacancy_id = $vacancy->id;
				$category_vacancy->save();
			}
		}
		return redirect()->route('create-Vacancy');
	}

	public function Delete_Vacancy($id){
		Vacancy::find($id)->delete();
		return redirect()->route('Company-Profile')->with('success' , 'Success deleted');
	}

	public function Edit_Vacancy($id){
		$vacancy=Vacancy::find($id);
		$categories = JobCategory::all();
		$vacancy_category = VacancyCategory::where('vacancy_id','=',$id)->get();
		return view('EditVacancy', ['vacancy'=>$vacancy ,
			'categories'=>$categories ,
			'vacancy_category'=>$vacancy_category]);
	}

	public function Edit_Vacancy_submit($id ,Request $request){
		$vacancy = Vacancy::find($id);
		$vacancy->name = $request->input('vacancy_name');
		$vacancy->requirement = $request->input('requirement');
		$vacancy->salary = $request->input('salary');
		$vacancy->company_id = $request->input('company_id');
		$vacancy->save();
		return redirect()->route('Edit-Vacancy' , $id);
	}

	public function vacancy_view($id){
		$vacancy = Vacancy::find($id);
		$requests_vacancies = Requests::where('vacancy_id' , '=' , $id)->get();
		$confirm = Confirm_Requests::where('vacancy_id' , '=' , $id)->get();
		$vcategories = VacancyCategory::where('vacancy_id','=',$id)->get();
		return view('VacancyView' , ['vacancy'=>$vacancy,
									'vcategories'=>$vcategories,
									'confirm'=>$confirm,
									'requests_vacancies'=>$requests_vacancies]);
	}

	public function SearchJob(Request $req) {

		$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	$search_text = $req->input('name_text');
    	$country_id = $req->input('country_id');
   		
    	if($country_id!=0){
	    	$result =Vacancy::where("name","like","%".$search_text."%")->join('companies', function ($join) use ($country_id){
	           $join->on('companies.id','=','vacancies.company_id')->where('companies.country_id', '=', $country_id);
	        })->get();
	      
    	}else{
    		$result = Vacancy::where("name","like","%".$search_text."%")->get();		 
		}

    	return view('FindJob' ,  ['vacancies'=>$result, 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
    	
	}


	public function byDate(){

		$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	$result = Vacancy::orderBy('created_at','desc')->get();


		return view('FindJob' ,  ['vacancies'=>$result, 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
	}

	public function bySalary(){

		$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	$result = Vacancy::orderBy('salary','desc')->get();


		return view('FindJob' ,  ['vacancies'=>$result, 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
	}

	public function SearchBycountry($id){

		$vacancies = new Vacancy;
    	$countries = new Country;
    	$companies = new Company;
    	
    	
   		
    	
	    $result =Vacancy::join('companies', function ($join) use ($id){
	           $join->on('vacancies.company_id', '=', 'companies.id')->where('companies.country_id', '=', $id);
	        })->get();

    	return view('FindJob' ,  ['vacancies'=>$result, 'countries'=>$countries->all() , 'companies'=>$companies->all()]);
	}


}
