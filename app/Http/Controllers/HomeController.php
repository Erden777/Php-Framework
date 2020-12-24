<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\JobCategory;
use App\Models\Requests;
use App\Models\Vacancy;

class HomeController extends Controller
{
    public function index(){
    	$requsetsvacancy = Requests::all();
    	$arr = array();
    	$vacancy=array();
    	if(session()->get('company')!=null){
	 		$vacancy = Vacancy::where('company_id',session()->get('company')->id)->get();

	 		foreach ($requsetsvacancy as $req) {
	 			if($vacancy->find($req->vacancy_id)!=null){

	 				array_push($arr, $req);
	 			}
	 		}
	 	}
    	$countries = new Country;
    	$categories = new JobCategory;
    	return view('index' , ['countries'=>$countries->all() , 
    							'categories'=>$categories->all(),
    							'sum'=>$arr, 
    							'vacancy'=>$vacancy]);
    }
}
