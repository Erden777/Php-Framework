@extends('Admin_layout.Admin_layout')

@section('title')Profile @endsection

@section('navbar')
	@parent
	<a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('user')->full_name }}</a>
	<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
@endsection

@section('main_content')

@include('inc.second_navbar')

<div class="container well span-6 offset-2 mt-4">

	<div class="row">
        <div class="col-md-2" >
		    <img width="160px" height="160px" src="{{session()->get('user')->picture_Url}}" class="img-circle">
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
        <div class="col-md-7">
	            <h3>{{session()->get('user')->full_name }}</h3>
	            <h6>Email:{{session()->get('user')->email}} </h6>
	            <h6>Tel-number: {{session()->get('user')->tel_number}} </h6>
	            <h6>Old: 19 Year</h6>
                @if($confirm!=null)
                <h6>Place of work:</h6>
                @foreach($confirm as $con)
                <h6>Company:{{$con->company->company_name}}  {{$con->vacancy->name}}</h6>    
                @endforeach
                @endif
	            @if(session()->get('user')->resumepath!=null)
	             <h6>Resume:<a href="{{route('download-resume' , session()->get('user')->resumepath)}}">
	             	 Downloads</a></h6>
	             @endif
	            <br>
         <form method="post" action="{{ route('upload-file')}}" enctype="multipart/form-data">
       		@csrf
       		<input type="hidden" name="userID" value="{{session()->get('user')->id}}">
       		<div class="custom-file mt-3">
			  <input type="file" class="custom-file-input" id="customFile" name="resume">
			  <label class="custom-file-label" for="customFile">Choose file</label>
			</div>
			<button class="btn btn-success btn-block mb-3 mt-3">Save</button>
       </form>

           <a href="{{route('user_details' , session()->get('user')->id )}}" class="btn btn-primary btn-sm" >Update</a>
        </div>
	</div>
</div>
	

@endsection
