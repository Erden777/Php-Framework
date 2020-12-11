@extends('Admin_layout.Admin_layout')

@section('title')Company profile @endsection
@section('navbar')
	@parent
	<a class="nav-link" href="{{route('Company-Profile')}}">{{session()->get('company')->company_name }}</a>
	<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
@endsection

@section('main_content')

@include('inc.second_navbar')
	<div class="container">
	    <div role="main">
	        <div class="container">
	            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 ">
	                <h1 class="h2" >{{session()->get('company')->company_name }}</h1>
	            </div>
	            @if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
					    <button type="button" class="close" data-dismiss="alert">×</button>    
					    <strong>{{ $message }}</strong>
					</div>
				@endif

				 @if(session()->get('company')->pictureURL!=null)
							    <img width="460px" height="360px" src="/storage/picture/{{session()->get('company')->pictureURL}}" class="img-circle">
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
	            <form action="{{route('Update-Company', $company->id)}}" method="post">
  		            @csrf
		                <div class="modal-body">
		                	 <div class="form-group">
		                      
		                        
		                    </div>
		                    <div class="form-group">
		                        <label >Company name</label>
		                        <input type="text" class="form-control" name="companyName" value="{{$company->company_name}}">
		                    </div>
		                    <div class="form-group">
		                        <label>Address</label>
		                        <input type="text" class="form-control" name="address_company" value="{{$company->company_address}}">
		                    </div>
		                    <div class="form-group">
		                        <label >Email</label>
		                        <input type="email" class="form-control" name="email" value="{{$company->email}}">
		                    </div>
		                       <div class="form-group">
		                        <label >Password</label>
		                        <input type="password" class="form-control" name="password" value="{{$company->password}}">
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button type="submit" class="btn btn-success">Save</button>
		       
		                </div>
	        	</form>
	   		 </div>
        </div>
	</div>
@endsection




