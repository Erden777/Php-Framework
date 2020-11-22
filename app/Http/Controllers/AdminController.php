<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Company;
use routes\web;

class AdminController extends Controller{
    
	public function register(AdminRequest $req){
			$user = new User();
			$user->full_name = $req->input('name');
			$user->email = $req->input('email');
			$user->tel_number = $req->input('number');
			$user->password = $req->input('password');
			$user->picture_Url = "https://www.computerhope.com/jargon/g/guest-user.jpg";
			$user->save();	
		
		return redirect()->route('admin-index');
	}

	public function index(){
		$company = new Company;
		$user= new User;
		return view('AdminPage' , ['users'=>$user->all() , 'companies'=>$company->all()]);
	}

	public function detailsUser($id){
		$user= new User;

		return view('detailsUser' , ['user'=>$user->find($id)]);
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
		$company = new Company;

		return view('EditCompany' , ['company'=>$company->find($id)]);

	}



}
