@extends('Admin_layout.layout')

@section('title')Company Requests @endsection

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
			 <a class="nav-link" href="{{route('Company-Profile')}}">{{session()->get('company')->company_name }}</a>
			 
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
						<div class="col-lg-2 text-right">All requests</div>
						<div class="col-lg-2">							
							<div class="form-group">
								<input type="text" name="specialty" class="form-control" maxlength="100" placeholder="Specialty">
							</div>
						</div>
							
					</form>
				</div>			
		</div>
        <br>
		<h4 class="dark mb15" style="text-align: center">Programmer, Almaty Region, {{count($requestsUsers)}} Requests</h4>
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
				@foreach($requestsUsers as $req)
				<div class="result-list-row">
					<div class="row">
						<div class="col-lg-2 col-md-2  col-sm-2 hidden-xs img-center">
							<img width="150" height="120" src="{{$req->reqUser()->picture_Url}}">
						</div>
						<div class="col-lg-6 col-md-7 col-sm-6">
							<div class="row-heading">
								<a href="#" style="font-weight: bold; font-size: 17px;" class="bold orange" style="text-decoration: none;">{{$req->reqUser()->full_name}} </a>
							</div>
							<div class="row-info">
								<p>{{$req->reqUser()->email}}</p>
								<p>
									<a href="#" class="bold dark" style="text-decoration:none ">
										{{$req->reqUser()->tel_number}}
									</a>
								</p>
							<div class="row">
								<div class="col-md-7">
								@if($req->reqUser()->resumepath!=null)
				             	<h6>
				             	<a style="color: blue" href="{{route('download-resume' , $req->reqUser()->resumepath)}}">
				             	Download Resume</a></h6>
				             	@endif
				             	</div>
				             	<div class="col-md-5">
				             		<div class="row">
				             		<div class="col-md-2">
				             		<form method="post" action="{{ route('tohire')}}">
				             			@csrf
				             			<input type="hidden" name="requestId" value="{{$req->id}}">
				             			<button class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
				             		</form>
				             		</div>
				             		<div class="col-md-2 ">
				             		<form method="post" action="{{ route('rejectrequests')}}">
				             			@csrf
				             			<input type="hidden" name="requestId" value="{{$req->id}}">
				             			<button class="btn btn-danger btn-sm "><i class="fas fa-minus"></i></button>
				             		</form>
				             	</div>
				             	</div>
				             	</div>

			             	</div>

							</div>
							<div class="row-text">
								<p class="grey" style="color: darkgrey">{{$req->created_at}}</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-3 col-sm-3">
							<ul>
								<li>
									<span class="badge badge-warning">
									<i class="fa fa-briefcase"></i>
									{{$req->reqVacancy()->name}}
								</span>
								</li>
								<li>
									<span class="badge badge-info">
									<i class="fa fa-dollar-sign"></i>
									{{$req->reqVacancy()->salary}} KZT
								</span>
								</li>
								
								<li>
									<span class="badge badge-success">
									<i class="fa fa-graduation-cap"></i>
									{{$req->reqVacancy()->Company->company_name}}
								</span>
								</li>
					
							</ul>
						</div>
					</div>
				</div>
			
				@endforeach
				</div>
				</div>
			</div>
			</div>
            
			
			</div>
		</div>


@endsection