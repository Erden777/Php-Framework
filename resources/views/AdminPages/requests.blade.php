 	@extends('Admin_layout.newadmin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<div class="container">
	<hr class="my-4">
	  <div class="container-fluid bg-light">
	    <h2 style="padding: 30px 0 0 0">All Requests</h2>
	    <br>
	    <table class="table table-striped ">
	      <thead>
	        <tr>
	          <th scope="col">#</th>
	          <th scope="col">FULL NAME</th>
	          <th scope="col">VACANCY</th>
	          <th scope="col">COMPANY</th>
	          <th scope="col">SUBSCRIBED AT</th>
	        </tr>
	     	</thead>
	     		<tbody>
	     			@foreach($requests as $e)
		     		<tr>
		     			<td>{{ $e->id }}</td>
		     			<td>{{ $e->user->full_name }}</td>
		     			<td>{{ $e->vacancy->name }}</td>
		     			<td>{{ $e->vacancy->Company->company_name }}</td>
		     			<td>{{ $e->created_at}}</td>
		     		</tr>
		     		@endforeach
	     		</tbody>
	     	</table>
	  </div>
</div>
@endsection