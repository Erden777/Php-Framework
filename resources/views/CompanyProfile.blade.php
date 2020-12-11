@extends('Admin_layout.Admin_layout')

@section('title')Profile @endsection

@section('navbar')
	@parent
	<a class="nav-link" href="{{route('Company-Profile')}}">{{session()->get('company')->company_name }}</a>
	<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
@endsection

@section('main_content')

@include('inc.second_navbar')

<div class="container well span-6 offset-2 mt-4">
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
	<div class="row">
        <div class="col-md-3" >
            @if(session()->get('company')->pictureURL!=null)
		    <img width="260px" height="190px" src="/storage/picture/{{session()->get('company')->pictureURL}}" class="img-circle">
            @endif
             <form method="post" action="{{ route('Company-Ava-Upload')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="companyID" value="{{session()->get('company')->id}}">
                <div class="custom-file mt-3">
                  <input type="file" class="custom-file-input" id="customFile" name="picture">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <button class="btn btn-success btn-block mb-3 mt-3">Save</button>
            </form>
        </div>
        
             
        <div class="col-md-6">
	            <h3>{{session()->get('company')->company_name}}</h3>
	            <h6>Email: {{session()->get('company')->email}} </h6>
	            <h6>Address: {{session()->get('company')->company_address}} </h6>
                <h6>Country: {{session()->get('company')->country->name}} </h6>
                <br>
                <a href="{{route('Details-Company-Edit' , session()->get('company')->id )}}" class="btn btn-primary btn-sm" >Update profile</a>
	            <br>
                <br>
                @foreach($vacancies as $vacancy)
                    @if($vacancy->company_id==session()->get('company')->id)
                        <div class="jumbotron mt-1">
                            <h3>{{$vacancy->name}}</h3>
                            <p class="lead">{{$vacancy->requirement}}</p>
                            <a class="btn btn-lg btn-primary btn-sm" href="{{route('Edit-Vacancy' , $vacancy->id)}}" role="button">Edit »</a>
                            <a class="btn btn-lg btn-danger btn-sm" href="{{route('Delete-Vacancy' , $vacancy->id)}}" role="button">Delete</a>
                        </div> 
                    @endif
                 @endforeach
           
        </div>
	</div>
</div>
	

@endsection
