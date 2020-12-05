<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CompanyController;

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/contact', function () {
    return view('AdminPage');
})->name('contact');

Route::get('/register', function () {
    return view('Registration');
});

///User operations
Route::post('/register/submit' ,[UserAuthController::class,'register'])->name('register-form');

Route::get('/login' ,[UserAuthController::class,'login'])->name('Loginin');

Route::get('/profile' ,[UserAuthController::class,'ProfilePage'])->name('ProfilePage');
	
Route::get('/loginSubmit' , function(Request $req){
	if(!$req->has('isUser')){
		$auth = new CompanyController();
		return $auth->CompanyLoginSubmit();
	
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


