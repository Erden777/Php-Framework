<?php

///http://studentsandgraduates.com/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Requests;
use App\Models\Confirm_Requests;
use routes\web;	

class AdminController extends Controller{
    
	
	public function index(){
		$request = Requests::all();
		$user= User::all();
		$confirm = Confirm_Requests::all();
		$vacancy=Vacancy::all();
		$sum =0 ;
		foreach ($vacancy as $key) {
			$sum+=$key->salary;
		}

		return view('AdminPage' , ['usersize'=>count($user) , 
			'confirmsize'=>count($confirm) , 
			'vacancysize'=>count($vacancy) , 
			'requestsize'=>count($request),
			'avaragesalary'=>($sum/count($vacancy))]);
	}


	public function allUsers(){
		$user= new User;
		return view('/AdminPages/users' , ['users'=>$user->all()]);
	}


	public function allcompanies(){
		$company = new Company;
		return view('/AdminPages/companies' , ['companies'=>$company->all()]);	
	}

	public function allvacancies(){
		$company = new Company;
		$vacancy = new Vacancy;
		return view('/AdminPages/vacancies' , ['vacancies'=>$vacancy->all() , 
	 'companies'=>$company->all()]);
	}

	public function detailsUser($id){
		$user= new User;
		return view('detailsUser' , ['user'=>$user->find($id)]);
	}


	public function allemployeers(){
		$employee = new Confirm_Requests;
		return view('/AdminPages/confirm_requests' , ['employee'=>$employee->all()]);
	}

	public function allrequests(){
		$requests = new Requests;
		return view('/AdminPages/requests' , ['requests'=>$requests->all()]);
	}

	//Vacancy functions
	//Company functions add edit delete
	public function addVacancy(Request $request){
			
			$vacancy = new Vacancy();
			$vacancy->name = $request->input('vacancy_name');
			$vacancy->requirement = $request->input('requirement');
			$vacancy->salary = $request->input('salary');
			$vacancy->company_id = $request->input('company_id');
			$vacancy->save();
		return redirect()->route('admin-index');
	}

	//Company functions add edit delete
	public function AddCompany(Request $request){
			$validatedData = $request->validate([
		        'companyName' => 'required|max:255',
		        'address_company' => 'required',
		        'city' => 'required',
		        'email' => 'required|email',
		    ]);
			$company = new Company();
			$company->company_name = $request->input('companyName');
			$company->company_address = $request->input('address_company');
			$company->company_city = $request->input('city');
			$company->email = $request->input('email');
			$company->save();
		return redirect()->route('admin-index');
	}

	public function EditCompany($id){
		$company = new Company();
		return view('EditCompany' , ['company'=>$company->find($id)]);
	}

	public function EditCompanySubmit($id , Request $request){
			$company =Company::find($id);
			$company->company_name = $request->input('companyName');
			$company->company_address = $request->input('address_company');
			$company->company_city = $request->input('city');
			$company->email = $request->input('email');
			$company->save();
			return redirect()->route('Edit-Company' , $id);
	}

	public function DeleteCompany($id){
		Company::find($id)->delete();
		return redirect()->route('admin-index')->with('success' , 'Success deleted');
	}



	public function getVacancyByCompany($id){
		$vacancy=Company::find($id);
		
		return dd($vacancy);
	}




}
