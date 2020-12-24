 	@extends('Admin_layout.newadmin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
<div class="container">
	 
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
		      <th scope="col">Salary</th>
		      <th scope="col">Company</th>
		    </tr>
		  </thead>
		  <tbody>
		  		@foreach($vacancies as $vacancy)
		  		<tr>
	     			<td>{{$vacancy->id}}</td>
	     			<td>{{$vacancy->name}}</td>
	     			<td>{{$vacancy->requirement}}</td>
	     			<td>{{$vacancy->salary}} KZT</td>
	     			<td>{{$companies->find($vacancy->company_id)->company_name}}</td>
		     	</tr>
		     	@endforeach
		  </tbody>
		</table>
	</div>

	<!-- Modal for Add vacancy -->
	<div class="modal fade " id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="basicExampleModal2"
	  aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header ">
	        <h5 class="modal-title" id="basicExampleModal2">Add new vacancy</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" action="{{ route('addvacancy') }}">
		      <div class="modal-body">
		      		@csrf
	                <div class="form-group">
	                  <label>Name</label>
	                  <input type="text" class="form-control" name="vacancy_name">
	                </div>
	                <div class="form-group">
	                  <label>Requirement</label>
	                  
	                    <textarea class="form-control" id="exampleFormControlTextarea1" name="requirement" rows="3"></textarea>
	                </div>
	              <div class="form-group">
	                <label>Salary</label>
	                <input type="number" class="form-control" name="salary">
	              </div>
	              <div class="form-group">
				    <label for="exampleFormControlSelect1">Company</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="company_id">
				    	@foreach($companies as $c)
					      <option value="{{$c->id}}">{{$c->company_name}}</option>
					      @endforeach
				    </select>
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

<hr class="my-4">

</div>
@endsection




