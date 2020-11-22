@extends('Admin_layout.Admin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<div class="container">
	<hr class="my-4">
	  <div class="container-fluid bg-light">
	    <h2 style="padding: 30px 0 0 0">All Users</h2>
	    <br>
	    <table class="table table-striped ">
	      <thead>
	        <tr>a 
	          <th scope="col">#</th>
	          <th scope="col">NAME</th>
	          <th scope="col">TELEPHONE</th>
	          <th scope="col">E-email</th>
	          <th scope="col">Details</th>
	        </tr>
	     	</thead>
	     		<tbody>
	     			@foreach($users as $user)
		     		<tr>
		     			<td>{{ $user->id }}</td>
		     			<td>{{ $user->full_name }}</td>
		     			<td>{{ $user->tel_number }}</td>
		     			<td>{{ $user->email }}</td>
		     			<td><a href="{{route('user_details' , $user->id )}}"  class="btn btn-primary btn-sm" >details</a></td>
		     		</tr>
		     		@endforeach
	     		</tbody>
	     	</table>
	  </div>

	<hr class="my-4">
	  <div class="container-fluid bg-light">
		  <div class="col-md-12 align-items-center">
		    <h2  style="padding: 30px 0 0 0">Vacancy</h2>
		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal2">
		  Add new
		</button>
		    </div>
		    <br>
		    <table class="table ">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Requirements</th>
		      <th scope="col">Company ID</th>
		    </tr>
		  </thead>
		  <tbody>

		  		<tr>
	     			<td>1</td>
	     			<td>Erden Aidynuly</td>
	     			<td>877777777</td>
	     			<td>erden@gmail.com</td>
		     	</tr>
		  </tbody>
		</table>
	</div>



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
	     			<td>{{ $company->company_name}}</td>
	     			<td>{{ $company->company_address}}</td>
	     			<td>{{ $company->company_city}}</td>
	     			<td>{{ $company->company_email}}</td>
	     			<td><a class="btn btn-warning btn-sm" >Edit</a></td>
		     	</tr>
		     @endforeach
		  </tbody>
	</table>
</div>
</div>
	

@endsection




