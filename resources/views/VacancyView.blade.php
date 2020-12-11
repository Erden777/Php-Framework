@extends('Admin_layout.Admin_layout')

@section('title')View vacancy @endsection

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

@section('main_content')

@include('inc.second_navbar')

<div class="container well span-6 offset-2 mt-4" style="min-height: 450px;">

	<div class="row">
       <div class="col-lg-3 col-md-4 col-sm-4 hidden-xs img-center">
                            <img width="250" height="220" src="https://image.pngaaa.com/346/744346-middle.png">
                        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif    

        <div class="col-md-6">
	            <h2 class="h2 mb-3">{{$vacancy->name }}</h2>
                <div class="alert alert-danger" role="alert">
	            <h6>Requirement: {{$vacancy->requirement}} </h6>
                </div>
                <div class="alert alert-warning" role="alert">
	            <h6>Salary: {{$vacancy->salary}} KZT</h6>
                </div>
                 <div class="alert alert-secondary" role="alert">
	            <h6>Company: {{$vacancy->Company->company_name }}</h6>
                 </div>
	               @if($vacancy->created_at!=null)
                <div class="alert alert-info" role="alert">
	             <h6>{{$vacancy->created_at}}</h6>
                </div>
	             @endif
                 <br>
                 <h3>Categories</h3>
                 @foreach($vcategories as $category)
                    <span class="badge badge-pill badge-warning">{{$category->category->name}}</span>
                 @endforeach
	            <br>
                <br>
            @if(session()->get('user')!=null)
           <a href="#" class="btn btn-primary btn-sm" >Subscribe</a>
           @endif
        </div>
	</div>
</div>
@endsection
