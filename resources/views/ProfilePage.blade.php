@extends('Admin_layout.Admin_layout')

@section('title')Profile @endsection

@section('main_content')

@include('inc.second_navbar')

<div class="container well span-6 offset-2 mt-4">

	<div class="row">
        <div class="col-md-2" >
		    <img width="160px" height="160px" src="{{session()->get('user')->picture_Url}}" class="img-circle">
        </div>        
        <div class="col-md-7">
   			
	            <h3>{{session()->get('user')->full_name }}</h3>
	            <h6>Email:{{session()->get('user')->email}} </h6>
	            <h6>Tel-number: {{session()->get('user')->tel_number}} </h6>
	            <h6>Old: 19 Year</h6>
         
        </div>
       
	</div>
	<div class="offset-2 col-md-3">
           <a href="{{route('user_details' , session()->get('user')->id )}}" class="btn btn-primary btn-sm" >Update</a>
        </div>
</div>
	

@endsection
