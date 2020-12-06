<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class HomeController extends Controller
{
    public function index(){
    	$countries = new Country;
    	return view('index' , ['countries'=>$countries->all()]);
    }
}
