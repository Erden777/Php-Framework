@extends('Admin_layout.Admin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
	<div class="container" layout:fragment="main_admin_content">
	    <div role="main">
	        <div class="container">
	             <h1 class="h2">NAME: {{$company->company_name}}</h1>
	            <form action="{{ route('Edit-Company-submit' , $company->id ) }}" method="post">
		            	@csrf
		                <div class="modal-body">
		                    <div class="form-group">
		                        <label>NAME</label>
		                        <input type="text" class="form-control" name="companyName" value="{{$company->company_name}}">
		                    </div>
		                  
		                    <div class="form-group">
		                        <label>EMAIL</label>
		                        <input type="text" class="form-control" name="email" value="{{$company->email}}">
		                    </div>
							<div class="form-group">
		                        <label>CITY</label>
		                        <input type="text" class="form-control" name="city" value="{{$company->company_city}}">
		                    </div>
		                    <div class="form-group">
		                        <label>ADDRESS</label>
		                        <input type="text" class="form-control" name="address_company" value="{{$company->company_address}}">
		                    </div>		                    
		                </div>
		                <div class="modal-footer">
		                    <button type="submit" class="btn btn-success">SAVE</button>
		                    <a class="btn btn-danger" href="{{ route('Delete-Company' , $company->id)}}">DELETE</a>
		                </div>
	        	</form>
	   		 </div>
        </div>
	</div>
@endsection




