@extends('Admin_layout.layout')

@section('title')Index Page @endsection

@section('main_content')

@section('navbar')
		@parent
		@if(session()->get('user')==null && session()->get('company')==null)
			<li class="nav-item">
				 <a class="nav-link" href="/register">Regitration</a>
			</li>
			<li class="nav-item">
				 <a class="nav-link" href="{{ route('register-company') }}">Regitration Company</a>
			</li>
			<li class="nav-item">
				 <a class="nav-link" data-toggle="modal" data-target="#elegantModalForm" href="#">Login in</a>
			</li>
		@endif
		@if(session()->get('user')!=null)
			<li class="nav-item">
				 <a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('user')->full_name }}</a>
			</li>
			<li class="nav-item">
				<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
			</li>
		@endif
		
		@if(session()->get('company')!=null)
		<li class="nav-item">
			 <a class="nav-link btn btn-outline-info" href="{{route('create-Vacancy')}}">Add Vacancy</a>
		</li>
		<li class="nav-item">
			 <a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('company')->company_name }}</a>
			 
		</li>
		<li class="nav-item">
			<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
		</li>

		@endif
 
@endsection


<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <form method="get" action="{{route('LogininSubmit')}}">
      	@csrf
	      <div class="modal-body mx-4">
	        <!--Body-->
	        <div class="md-form mb-5">
	          <input type="email" id="Form-email1" name="email" class="form-control validate">
	          <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
	        </div>

	        <div class="md-form pb-3">
	          <input type="password" id="Form-pass1" name="password" class="form-control validate">
	          <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
	          <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
	              Password?</a></p>
	        </div>

	        <div class="text-center mb-3">
	          <button type="submit" class="btn btn-outline-info btn-block">Sign in</button>
	        </div>

	      </div>
  	</form>
      <!--Footer-->
      <div class="modal-footer mx-5 pt-3 mb-1">
        <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="/register" class="blue-text ml-1">
            Sign Up</a></p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->
	<div style="margin-top: 20px margin-bottom: 20px;">
			<div class="view">
				<div class="form">
					<div class="title">	
						<h2 class="word"><b>STUDENTS AND GRADUATES</b></h2>
					</div>
					<div class="underTitle">
						<h5 class= "under">Careers and Employment Service</h5>
					</div>
				</div>
			</div>
		</div>

		@include('inc.second_navbar')

	<div class="container" style="margin-bottom: 70px; margin-top: 70px">
		<div class="row justify-content-md-center">
			
				<div class=" col-md-4 col-sm-6  mb-2 mt-4 ">
				<div style="min-height: 140px" class="white-box">
				<div class="border ">
				<div class="logo"><img src="/img/1.png" alt="..." class="img-thumbnail">
				</div>
				<div class="h21"><a style="color: black;" href="#" >Team work</a></div>
			</div>
			</div>
		</div>
		
			<div class=" col-md-4 col-sm-6  mb-2 mt-4 offset-0">
				<div style="min-height: 140px" class="white-box">
					<div class="border">
					<div class="logo">
					<img src="/img/2.png" alt="..." class="img-thumbnail">

			</div>
			<div class="h21"><a style="color: black;" href="#" >Flexible schedule</a></div>
			</div>
		</div>
		</div>

			<div class=" col-md-4 col-sm-6  mb-2 mt-4 offset-0">
				<div style="min-height: 140px" class="white-box">
					<div class="border">
				<div class="logo">
					<img src="/img/1.png" alt="..." class="img-thumbnail">
			</div>
			<div class="h21"><a style="color: black;" href="#">our graduates</a></div>
			</div>
			</div>
		</div>
		
		<div class=" col-md-4 col-sm-6  mb-2 mt-4 offset-0">
				<div style="min-height: 140px" class="white-box">
					<div class="border">
				<div class="logo">
					<img src="/img/5.png" alt="..." class="img-thumbnail">
			</div>
			<div class="h21"><a style="color: black;" href="#" >Hard work</a></div>
			</div>
			</div>
		</div>

		<div class=" col-md-4 col-sm-6  mb-2 mt-4 offset-0">
				<div style="min-height: 140px" class="white-box">
					<div class="border">
				<div class="logo">
					<img src="/img/4.png" alt="..." class="img-thumbnail">
			</div>
			<div class="h21"><a style="color: black;" href="#" >Office work</a></div>
			</div>
			</div>
		</div>

		<div class=" col-md-4 col-sm-6  mb-4 mt-4 offset-0">
				<div style="min-height: 140px" class="white-box">
					<div class="border">
				<div class="logo">
					<img src="/img/6.png" alt="..." class="img-thumbnail">
			</div>
			<div class="h21"><a style="color: black;" href="#" >Unemployed </a></div>
			</div>
			</div>
		</div>
		</div>
	</div>

	<div class="container-fuild" style="background-color: #302d42; padding: 30px 0">
    <div class="card mb-3 offset-1" style="max-width: 1200px; background-color: #302d42">
      <div class="row no-gutters center">
        <div class="col-md-4 mb-4 mt-4">
          <img src="/img/fan.jpg" class="card-img" alt="...">
        </div>
        <div class="col-md-8 center">
          <div class="card-body">
            <h4 class="card-title mt-4" style="color: white">JOIN THE INDUSTRY MENTORING PROGRAM</h4>
            <h6 class="card-text mt-4" style="color: white; font-weight: 400">Engaging with a mentor in your chosen field can help you gain industry exposure, build your network and make progress towards your career</h6>
            <br>  
            <br>  
            <a class="btn btn-info lead" href="#" role="button">Inductry Metoring Program </a>
          </div>
        </div>
      </div>
    </div>
        </div>
<br>
<br>
	<hr class="my-4">
        <br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-1">
				<h1 style="color: black; font-size: 25px;  line-height: 1.5;">
						Do you know where your degree is taking you? Are you job ready?</h1>
			</div>
			<div class="col-md-5">
				<p class="lead" style="font-size: 16px;">At the Careers and Employment Service, we can help you:</p>
				 <li class="lead" style="font-size: 16px;">understand your career options</li>
				 <li class="lead" style="font-size: 16px;">market yourself to employers</li>
				 <li class="lead" style="font-size: 16px;">transition to graduate employment</li>
				 <li class="lead" style="font-size: 16px;">find suitable employment while you’re studying.</li>
				 <br>
				 <p class="lead" style="font-size: 16px;">We also have a range of information and events to help you on your journey.</p>

			</div>
		</div>
	</div>
	<br>
	<hr class="my-4">
	<!--vacancies-->
	<div class="container" style="margin-bottom: 70px; margin-top: 50px">
		<section class="section pb-3 text-center">
			<h2 class="section-heading h1 pt-4">Vacancies</h2>
		 </section>

		 <div class="row">
		 	<div class="col-md-6 col-sm-12">
		 		<div class="white-box">
		 		<h5>IN THE REGIONS:</h5>
		 		<div class="row ml-2">
		 			<div class="col-md-6">
		 				<ul class="list-group list-group-flush">
		 				@for($i=0 ; $i< 9; $i++)
						  <li class="list-group-item"><a href="#">{{ $countries[$i]->name}}</a></li>
						   @endfor  
						</ul>
		 			</div>


		 			<div class="col-md-6">
		 				<ul class="list-group list-group-flush">
		 				@if(count($countries)>9)
		 					@for($i = 9 ; $i< count($countries) ; $i++ )
						  		<li class="list-group-item"><a href="#">{{ $countries[$i]->name}}</a></li>
						  	 @endfor  
						  @endif
						</ul>
		 			</div>
				 		
				 		<button type="button" class="btn btn-outline-info waves-effect ml-4 mb-4 mt-4">All regions</button>
		 			</div>
			 	</div>
			 	</div>

		 	<div class="col-md-6 col-sm-12">
		 		<div class="white-box">
		 		<h5>BY SPECIALTY:</h5>
		 		<div class="row ml-2">
		 			<div class="col-md-6">
		 				<ul class="list-group list-group-flush">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						   <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						 
						</ul>
		 			</div>


		 			<div class="col-md-6">
		 				<ul class="list-group list-group-flush">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						   <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Porta ac consectetur ac</li>
						 
						</ul>
		 			</div>
		 		
		 		<button type="button" class="btn btn-outline-info waves-effect ml-4 mb-4 mt-4">All industries</button>
		 		</div>
		 	</div>
		 	</div>
	</div>
</div>
<br>
<br>


@endsection