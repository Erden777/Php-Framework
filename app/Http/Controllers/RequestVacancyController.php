<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\JobCategory;
use App\Models\Requests;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\Confirm_Requests;


class RequestVacancyController extends Controller
{
    
    public function subscribeVacancy(Request $req ,$id){
    	$vacancy = Vacancy::find($id)->first();
    	$requsetsvacancy = Requests::all();
    	$t=true;
    	foreach ($requsetsvacancy as $key) {
    		if($key->user_id==session()->get('user')->id && $key->vacancy_id==$id){
    				$t=false;
    		}
    	}
    	if(session()->get('user')!=null && $t==true){
    		$request = new Requests();
    		$request->user_id = session()->get('user')->id;
    		$request->vacancy_id= $id;
    		$request->save();
    		return redirect()->back();
    	}
    	return redirect()->back();
    }

    public function UnsubscribeVacancy($id){
    	$requsetsvacancy = Requests::where('user_id' , '=',session()->get('user')->id)->where('vacancy_id' ,'=' , $id)->delete();
    	
    	return redirect()->back();
    }


    public function requestUsers(){
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
    	return view('CompanyRequestView' , [ 
    							'categories'=>$categories->all(),
    							'requestsUsers'=>$arr]);

    }


    public function toHire(Request $req){
    	$requsetsvacancy = Requests::find($req->input('requestId'));
    	$confirm = new Confirm_Requests;
    	$confirm->user_id = $requsetsvacancy->user_id;
    	$confirm->company_id= $requsetsvacancy->reqVacancy()->Company->id;
    	$confirm->vacancy_id = $requsetsvacancy->vacancy_id;
    	$confirm->save();
    	Requests::find($req->input('requestId'))->delete();
    	return redirect()->back();
    }

    public function RejectRequest(Request $req){
    	Requests::find($req->input('requestId'))->delete();
    	return redirect()->back();
    }
}
