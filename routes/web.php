<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\CategoryController;
use App\Models\JobCategory;

use Illuminate\Http\Request;


Route::get('/', [HomeController::class,'index'])->name('/');

Route::get('/contact', function () {
    return view('AdminPage');
})->name('contact');


Route::get('/register', function () {
	$categories = new JobCategory;
   	 return view('Registration' , ['categories'=>$categories->all()]); 
});

Route::get('/registerCompany' ,[CompanyController::class,'register'])->name('register-company');
///User operations
Route::post('/register/submit' ,[UserAuthController::class,'register'])->name('register-form');

Route::post('/register1/submit' ,[CompanyController::class,'registerCompany'])->name('register-company-form');


Route::get('/login' ,[UserAuthController::class,'login'])->name('Loginin');

Route::get('/profile' ,[UserAuthController::class,'ProfilePage'])->name('ProfilePage');
	
Route::get('/loginSubmit' , function(Request $req){
	if($req->has('isCompany')){
		$auth = new CompanyController();
		return $auth->CompanyLoginSubmit($req);
	
	}else{
		$auth= new UserAuthController();
		return $auth->loginSubmit($req);
	}
})->name('LogininSubmit');

Route::get('profile/logout' , [UserAuthController::class, 'Logout'])->name('Logout');

Route::get('/admin' ,[AdminController::class,'index'])->name('admin-index');

Route::get('/admin/{id}' ,
	[AdminController::class,'detailsUser']
)->name('user_details');

Route::post('/Edit/{id}' , 
	[UserAuthController::class,'UpdateUser']
)->name('Update-User');

///Company routes
Route::post('/addCompany' ,[AdminController::class,'AddCompany'])->name('addcompany');

Route::post('/addVacancy' ,[AdminController::class,'addVacancy'])->name('addvacancy');

Route::post('/add/Vacancy' ,[VacancyController::class,'addVacancyWithCategory'])->name('Add-Vacancy-With-category');


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
Route::post('/image/upload' , [UserAuthController::class,'uploadFile'])->name('upload-file');
Route::get('resume/view/{resume}' ,[UserAuthController::class , 'downloadresume'])->name('download-resume');

//find job
Route::get('find/job' , [VacancyController::class, 'getAllVacancy'])->name('find-job');


//Assign category
Route::post('assign/category' , [CategoryController::class  ,'assignVacancyCategory'])->name('assignCategory');

Route::get('create/vacancy' , [CategoryController::class  ,'create_vacancy'])->name('create-Vacancy');