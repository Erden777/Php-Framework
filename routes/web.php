<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RequestVacancyController;
use App\Models\JobCategory;

use Illuminate\Http\Request;


Route::get('/',
 [HomeController::class,'index']
)->name('/');

Route::get('/contact', function () {
    return view('AdminPage');
})->name('contact');


Route::get('/register', function () {
	$categories = new JobCategory;
   	 return view('Registration' ,
   	 ['categories'=>$categories->all()]); 
});

Route::get('/registerCompany' ,
	[CompanyController::class,'register']
)->name('register-company');
///User operations
Route::post('/register/submit' ,
	[UserAuthController::class,'register']
)->name('register-form');

Route::post('/register1/submit' ,
	[CompanyController::class,'registerCompany']
)->name('register-company-form');


Route::get('/login' ,
	[UserAuthController::class,'login']
)->name('Loginin');

Route::get('/profile' ,
	[UserAuthController::class,'ProfilePage']
)->name('ProfilePage');
	
Route::get('/loginSubmit' , function(Request $req){
	if($req->has('isCompany')){
		$auth = new CompanyController();
		return $auth->CompanyLoginSubmit($req);
	}else{
		$auth= new UserAuthController();
		return $auth->loginSubmit($req);
	}
})->name('LogininSubmit');

Route::get('profile/logout', 
	[UserAuthController::class, 'Logout']
)->name('Logout');

Route::get('/admin' ,
	[AdminController::class,'index']
)->name('admin-index');

Route::get('/admin/{id}' ,
	[AdminController::class,'detailsUser']
)->name('user_details');

Route::post('/Edit/{id}' , 
	[UserAuthController::class,'UpdateUser']
)->name('Update-User');

///Company routes
Route::get('company/profile' , 
	[CompanyController::class , 'companyProfile']
)->name("Company-Profile");

Route::get('company/details/{id}/',
	[CompanyController::class , 'detailsCompany']
)->name('Details-Company-Edit');

Route::post('company/details/{id}/update',
	[CompanyController::class , 'updateCompany']
)->name('Update-Company');

Route::post('/addCompany' ,
	[AdminController::class,'AddCompany']
)->name('addcompany');

Route::post('/addVacancy' ,
	[AdminController::class,'addVacancy']
)->name('addvacancy');

Route::post('/add/Vacancy' ,
	[VacancyController::class,'addVacancyWithCategory']
)->name('Add-Vacancy-With-category');

Route::get('/delete/Vacancy/{id}' ,
	[VacancyController::class,'Delete_Vacancy']
)->name('Delete-Vacancy');

Route::get('/edit/Vacancy/{id}' ,
	[VacancyController::class,'Edit_Vacancy']
)->name('Edit-Vacancy');

Route::post('/edit/Vacancy/{id}/submit' ,
	[VacancyController::class,'Edit_Vacancy_submit']
)->name('Edit-Vacancy-submit');

Route::post('/upload/company/ava' , 
	[CompanyController::class ,'uploadCompanyPicture']
)->name('Company-Ava-Upload');


Route::get('/admin/edit/{id}' ,
	[AdminController::class,'EditCompany']
)->name('Edit-Company');

Route::post('/admin/edit/{id}/submit' ,
	[AdminController::class,'EditCompanySubmit']
)->name('Edit-Company-submit');

Route::get('/admin/edit/{id}/delete' ,
	[AdminController::class,'DeleteCompany']
)->name('Delete-Company');

Route::get('/vacancy/{id}' ,
	[AdminController::class,'getVacancyByCompany']
)->name('getCompany');

///Resume downloads
Route::post('/image/upload' , 
	[UserAuthController::class,'uploadFile']
)->name('upload-file');

Route::get('resume/view/{resume}' ,
	[UserAuthController::class , 'downloadresume']
)->name('download-resume');

//find job
Route::get('find/job' ,
 [VacancyController::class, 'getAllVacancy']
)->name('find-job');

//Assign category
Route::post('assign/category' , 
	[CategoryController::class  ,'assignVacancyCategory']
)->name('assignCategory');

Route::post('dissign/category' , 
	[CategoryController::class  ,'dissignVacancyCategory']
)->name('dissignCategory');

Route::get('create/vacancy' , 
	[CategoryController::class  ,'create_vacancy']
)->name('create-Vacancy');

Route::get('/vacancy/view/{id}' , 
	[VacancyController::class  ,'vacancy_view']
)->name('vacancy_view');

Route::post('/vacancy/request/{id}' ,
	[RequestVacancyController::class , 'subscribeVacancy'
])->name('subscribe-vacancy');

Route::post('/vacancy/Unsubscribe/{id}' ,
	[RequestVacancyController::class , 'UnsubscribeVacancy'
])->name('unsubscribe-vacancy');

Route::get('request/users',
	 [RequestVacancyController::class , 'requestUsers'
])->name('requestUsers');

Route::post('request/tohire' , [RequestVacancyController::class , 'toHire'])->name('tohire');
Route::post('request/reject' , [RequestVacancyController::class , 'RejectRequest'])->name('rejectrequests');

Route::post('findjob/search' , [VacancyController::class  , 'SearchJob'])->name('search-job');

Route::get('findjob/bydate' , [VacancyController::class  , 'byDate'])->name('by-date');
Route::get('findjob/bysalary' , [VacancyController::class  , 'bySalary'])->name('by-salary');

Route::get('byCountry/{id}' , [VacancyController::class  , 'SearchBycountry'])->name('by-country');

Route::get('viewallUsers'  ,[AdminController::class , 'allUsers'])->name('viewallUsers');
Route::get('viewallVacancy'  ,[AdminController::class , 'allvacancies'])->name('allvacancies');
Route::get('viewallComapnies' , [AdminController::class , 'allcompanies'])->name('allcompanies');
Route::get('viewallEmployee' , [AdminController::class  , 'allemployeers'])->name('allemployeers');
Route::get('viewallRequests' , [Admincontroller::class , 'allrequests'])->name('allrequests');