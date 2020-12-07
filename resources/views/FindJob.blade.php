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
										{{$vacancy->requirement}}
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