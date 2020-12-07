<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function index(){
    	$countries = new Country;
    	$categories = new JobCategory;
    	return view('index' , ['countries'=>$countries->all() , 'categories'=>$categories->all()]);
    }
}
