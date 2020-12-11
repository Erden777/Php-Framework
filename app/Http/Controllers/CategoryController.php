<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\JobCategory;
use App\Models\Vacancy;
use App\Models\VacancyCategory;

class CategoryController extends Controller
{

	public function create_vacancy(){
    	if(session()->get('company')!=null){
	    	$categories = new JobCategory;
	    	return view('CreateVacancy' , ['categories'=>$categories->all()]);
    	}else {
    		return redirect()->route('/');
    	}
    }

    public function assignVacancyCategory(Request $request){
    	$category_vacancy = new VacancyCategory;
    	$category_vacancy->category_id = $request->input('category_id');
    	$category_vacancy->vacancy_id = $request->input('vacancy_id');
        $category_vacancy->save();
    	//return dd($request);
    	return redirect()->route('Edit-Vacancy' , $request->input('vacancy_id'));
    }

    public function dissignVacancyCategory(Request $request){
        VacancyCategory::find($request->input('vCategory_id'))->delete();
        return redirect()->route('Edit-Vacancy' , $request->input('vacancy_id'));
    }
   
}
