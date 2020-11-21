@extends('Admin_layout.Admin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<hr class="my-4">
  <div class="container-fluid bg-light">
    <h2 style="padding: 30px 0 0 0">All Users</h2>
    <br>
    <table class="table table-spired">
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
	     		<tr>
	     			<td>1</td>
	     			<td>Erden Aidynuly</td>
	     			<td>877777777</td>
	     			<td>erden@gmail.com</td>
	     			<td><button class="btn btn-primary btn-sm">details</button></td>
	     		</tr>
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
	
	
@endsection




