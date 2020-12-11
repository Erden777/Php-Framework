<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Country;

class CompanyController extends Controller
{

    public function companyProfile(){
         if(session()->get('company')!=null){
             $vacancies = new Vacancy;
             return view('CompanyProfile' , ['vacancies'=>$vacancies->all()]);
        }else{
            return redirect()->route('Loginin');
        }
    }


     public function uploadCompanyPicture(Request $request){
            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();

            $request->file('picture')->move('storage/picture/', $filename);
            $company =Company::find($request->input('companyID'))->first();
            $id=$request->input('companyID');
            $company->pictureURL = $filename;
            $company->save();
            session(['company' => $company]);
        return redirect()->back();
    }

	public function register(){
		$countries = new Country;
		return view('RegistraionCompany' , ['countries'=>$countries->all()]);
	}
    //
	public function registerCompany(Request $req){
		 	$company = new Company();
            $company->company_name = $req->input('company_name');
            $country = Country::find($req->input('country_id'))->first();
            $company->company_city = $country->name;
            $company->company_address = $req->input('company_address');
            $company->country_id = $req->input('country_id');
            $company->email = $req->input('company_email');
            $company->password = $req->input('password');;
            $company->save();
          return redirect()->route('Loginin');  
	}

	public function CompanyLoginSubmit(Request $request){

		$company = Company::where('email','=',$request->email)->first();
        $data = Company::where('email',$request->email)->first();
        $pas = Company::Where('password',$request->password)->first();
        $admin = $request->email;
        $admin_pass = $request->password;
        if($admin == "admin@iitu.kz" && $admin_pass=="admin"){
            return redirect('admin'); 
        }
        if($data){
            if($pas){    
                session(['company' => $company]);
                return redirect()->route('/');  
            }else{
                return redirect()->route('Loginin'); 
            }	
        } 
        else{
            return view('Registration');
        } 
		
	}

    public function detailsCompany($id){
        $company= new Company;

        return view('EditCompanyProfile' , ['company'=>$company->find($id)]);
    }

    public function updateCompany($id , Request $request){

            $company =Company::find($id);
            $company->company_name = $request->input('companyName');
            $company->company_address = $request->input('address_company');
            $company->email = $request->input('email');
            $company->password = $request->input('password');
            $company->save();
             session(['company' => $company]);
            return redirect()->route('Company-Profile');
    }
}
