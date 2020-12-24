 	@extends('Admin_layout.newadmin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<div class="container">
	<hr class="my-4">
	  <div class="container-fluid bg-light">
	    <h2 style="padding: 30px 0 0 0">All Users</h2>
	    <br>
	    <table class="table table-striped ">
	      <thead>
	        <tr>
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
</div>
@endsection




