@extends('Admin_layout.Admin_layout')

@section('title')User details Page @endsection

@section('main_content') 
	<div class="container" layout:fragment="main_admin_content">
	    <div role="main">
	        <div class="container">
	            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 ">
	                <h1 class="h2" th:text="${item.getName()}"></h1>
	            </div>
	            @if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
					    <button type="button" class="close" data-dismiss="alert">×</button>    
					    <strong>{{ $message }}</strong>
					</div>
				@endif
	            <form action="{{route('Update-User' , $user->id)}}" method="post">
		            <input type="hidden" name="userID" th:value="{{ $user->id}}">
		            @csrf
		                <div class="modal-body">
		                	 <div class="form-group">
		                        <img width="160px" height="160px" src="{{$user->picture_Url}}" class="img-circle">
		                        <input type="text" class="form-control" name="picture_Url" value="{{$user->picture_Url}}">
		                    </div>
		                    <div class="form-group">
		                        <label >Full name</label>
		                        <input type="text" class="form-control" name="full_name" value="{{$user->full_name}}">
		                    </div>
		                    <div class="form-group">
		                        <label>Telephone number</label>
		                        <input type="number" class="form-control" name="tel_number" value="{{$user->tel_number}}">
		                    </div>
		                    <div class="form-group">
		                        <label >Email</label>
		                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
		                    </div>
		                       <div class="form-group">
		                        <label >Password</label>
		                        <input type="password" class="form-control" name="password" value="{{$user->password}}">
		                    </div>
		                </div>
		                <div class="modal-footer">
		                    <button type="submit" class="btn btn-success" >Save</button>
		                    <button type="button"  class="btn-sm btn-danger">Delete</button>
		                </div>
	            
	        	</form>
	   		 </div>
        </div>
	</div>
@endsection




