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
	          <th scope="col">COMPANY</th>
	          <th scope="col">VACANCY</th>
	          <th scope="col"></th>
	        </tr>
	     	</thead>
	     		<tbody>
	     			@foreach($employee as $e)
		     		<tr>
		     			<td>{{ $e->id }}</td>
		     			<td>{{ $e->user->full_name }}</td>
		     			<td>{{ $e->company->company_name }}</td>
		     			<td>{{ $e->vacancy->name }}</td>
		     			<td></td>
		     		</tr>
		     		@endforeach
	     		</tbody>
	     	</table>
	  </div>
</div>
@endsection