 	@extends('Admin_layout.newadmin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<div class="container">
	<hr class="my-4">
	  
	<div class="bg-light">
	  <div class="col-md-12 align-items-center">
	    <h2 style="padding: 30px 0 0 0">Companies</h2>
	    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
	  		+ ADD NEW
		</button>
	    </div>
		 @if($errors->any())
		    	<div class="alert alert-danger" >
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    @endif
	    <!-- Modal for Add Companies -->
	<div class="modal fade " id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	  aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header ">
	        <h5 class="modal-title" id="exampleModalLabel">Add new company</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" action="{{ route('addcompany') }}">
		      <div class="modal-body">
		      		@csrf
	                <div class="form-group">
	                  <label>Name</label>
	                  <input type="text" class="form-control" name="companyName">
	                </div>
	                <div class="form-group">
	                  <label>Address</label>
	                    <input type="text" class="form-control" name="address_company">
	                </div>
	              <div class="form-group">
	                <label>City</label>
	                <input type="text" class="form-control" name="city">
	              </div>
	              <div class="form-group">
	                <label>Email</label>
	                <input type="email" class="form-control" name="email">
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

	    <br>
	    @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
		    <button type="button" class="close" data-dismiss="alert">×</button>    
		    <strong>{{ $message }}</strong>
		</div>
		@endif
	    <table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">City</th>
		      <th scope="col">Email</th>
		      <th scope="col">Operations</th>
		    </tr>
		  </thead>
		  <tbody>
		  	 @foreach($companies as $company)
		  		<tr>
	     			<td>{{ $company->id }}</td>
	     			<td>{{ $company->company_name }}</td>
	     			<td>{{ $company->company_address }}</td>
	     			<td>{{ $company->company_city }}</td>
	     			<td>{{ $company->email }}</td>
	     			<td><a href="{{route('Edit-Company' , $company->id )}}" class="btn btn-warning btn-sm" >Edit</a></td>
		     	</tr>
		     @endforeach
		  </tbody>
	</table>
</div>
</div>
@endsection




