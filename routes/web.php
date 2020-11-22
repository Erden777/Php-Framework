<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('AdminPage');
})->name('contact');

Route::get('/register', function () {
    return view('Registration');
});

Route::post('/register/submit' ,[AdminController::class,'register'])->name('register-form');

Route::get('/admin' ,[AdminController::class,'index'])->name('admin-index');

Route::get('/admin/{id}' ,
	[AdminController::class,'detailsUser']
)->name('user_details');

Route::post('/addCompany' ,[AdminController::class,'AddCompany'])->name('addcompany');


