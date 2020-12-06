@extends('Admin_layout.layout')

@section('title')Find job @endsection

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
			 <a class="nav-link btn btn-outline-info" data-toggle="modal" data-target="#basicExampleModal2" href="#">Add Vacancy</a>
		</li>
		<li class="nav-item">
			 <a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('company')->company_name }}</a>
			 
		</li>
		<li class="nav-item">
			<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
		</li>
		<div class="modal fade " id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="basicExampleModal2"
	  aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header ">
	        <h5 class="modal-title" id="basicExampleModal2">Add new vacancy</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" action="{{ route('addvacancy') }}">
		      <div class="modal-body">
		      		@csrf
	                <div class="form-group">
	                  <label>Name</label>
	                  <input type="text" class="form-control" name="vacancy_name">
	                </div>
	                <div class="form-group">
	                  <label>Requirement</label>
	                    <textarea class="form-control" id="exampleFormControlTextarea1" name="requirement" rows="3"></textarea>
	                </div>
	              <div class="form-group">
	                <label>Salary</label>
	                <input type="number" class="form-control" name="salary">
	              </div>
	              <div class="form-group">
				    <input type="text" name="company_id" value="{{session()->get('company')->id}}"> 
				  </div>
	          </div>
	      	  <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add</button>
			  </div>
	    </form>
	    </div>
	  </div>
	</div>
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

@include('inc.second_navbar')

	
<div class="container mt-4" style="margin-bottom: 70px">
		<div class="resoult-filter clearfix">
			
				<div class="row-line">
					<form class="form-inline">
						<div class="col-lg-2 text-right">Find</div>
						<div class="col-lg-2">							
							<div class="form-group">
								<input type="text" name="specialty" class="form-control" maxlength="100" placeholder="Specialty">
							</div>
						</div>
							<div class="form-group ">
								<select class="form-control " name="country_id">
									@foreach($countries as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>						
							</div>
							<div class="col-lg-2">
							<button class="btn btn-primary" type="submit">Search</button>
							</div>
					</form>
				</div>			
		</div>
        <br>
		<h4 class="dark mb15" style="text-align: center">Programmer, Almaty Region, {{count($vacancies)}} Vacancy</h4>
        <br>
		<div class="result-list clearfix">
			<div class="result-list-heading">
				<div class="row">
					<div class="col-xs-4 col-sm-6">
						<span class="hidden-xs"><strong>Filter</strong></span>
						<div class="btn-group" style="padding: 10px 0 10px 0">
							
							<button class="btn btn-sm btn-default dropdown-toggle"
									data-toggle="dropdown" aria-haspopup="true" aria-expended="false">
										By conformity
							</button>

							<ul class="dropdown-menu dropdown-menu-left">
								<li class="active"><a href="#" style="color: #007bff"> By conformity </a></li>
								<li><a href="#" style="color: #007bff"> By date </a></li>	
								<li><a href="#" style="color: #007bff"> By salary </a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="result-list-rows">
				@foreach($vacancies as $vacancy)
				<div class="result-list-row">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs img-center">
							<img src="/img/ava.png">
						</div>
						<div class="col-lg-6 col-md-7 col-sm-6">
							<div class="row-heading">
								<a href="#" class="bold orange" style="text-decoration: ">{{$vacancy->name}}</a>
							</div>
							<div class="row-info">
								<p>{{$vacancy->requirement}}</p>
								<p>
									<a href="#" class="bold dark" style="text-decoration: ">
										State communal institution "Secondary school 
										№26" State institution "Education department of the Ili district"
									</a>
								</p>
							</div>
							<div class="row-text">
								<p class="grey" style="color: darkgrey">14.09.2020</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-3">
							<ul>
								<li>
									<i class="fa fa-dollar-sign"></i>
									from {{$vacancy->salary}} tg.
								</li>
								<li>
									<i class="fa fa-briefcase"></i>
									With out work experience
								</li>
								<li>
									<i class="fa fa-graduation-cap"></i>
									Higher
								</li>
							
								<li>
									<i class="fa fa-map-marker"></i>
									{{ $countries->find($companies->find($vacancy->company_id)->country_id)->name }}/ Ili district
								</li>
								<li>
									<i class="fa fa-clock-o"></i>
									Full time work
								</li>
							</ul>
						</div>
					</div>
					@endforeach
			
				</div>
				</div>
				</div>
			</div>
			</div>
            
			<nav aria-label="...">
  				<ul class="pagination">
    				<li class="page-item disabled"><a class="page-link">Previous</a></li>
    				<li class="page-item active"><a class="page-link" href="#">1</a></li>
    				<li class="page-item"><a class="page-link" href="#">2</a></li>
    				<li class="page-item"><a class="page-link" href="#">3</a></li>
    				<li class="page-item"><a class="page-link" href="#">4</a></li>
    				<li class="page-item"><a class="page-link" href="#">5</a></li>
    				<li class="page-item"><a class="page-link" href="#">Next</a>
    				</li>
  				</ul>
			</nav>
			</div>
		</div>


@endsection