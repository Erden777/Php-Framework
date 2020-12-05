<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    //
	public function registerCompany(Request $req){
		 	$company = new Company();
            $company->company_name = $req->input('company_name');
            $company->company_address = $req->input('company_address');
            $company->company_city = $req->input('company_city');
            $company->email = $req->input('company_email');
            $company->password = $req->input('password');;
            $company->save(); 
	}

	public function CompanyLoginSubmit(){
		return redirect()->route('/');
	}
}
