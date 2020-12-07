@extends('Admin_layout.layout')

@section('title')Index Page @endsection

@section('main_content')

@section('navbar')
		@parent
		@if(session()->get('user')==null && session()->get('company')==null)
			<li class="nav-item">
				 <a class="nav-link" href="/register">Regitration</a>
			</li>
			<li class="nav-item">
				 <a class="nav-link" href="{{ route('register-company') }}">Regitration Company</a>
			</li>
			<li class="nav-item">
				 <a class="nav-link" data-toggle="modal" data-target="#elegantModalForm" href="#">Login in</a>
			</li>
		@endif
		@if(session()->get('user')!=null)
			<li class="nav-item">
				 <a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('user')->full_name }}</a>
			</li>
			<li class="nav-item">
				<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
			</li>
		@endif
		
		<li class="nav-item">
			 <a class="nav-link btn btn-outline-info" data-toggle="modal" data-target="#basicExampleModal2" href="#">Add Vacancy</a>
		</li>
		<li class="nav-item">
			 <a class="nav-link" href="{{route('ProfilePage')}}">{{session()->get('company')->company_name }}</a>
			 
		</li>
		<li class="nav-item">
			<a  class="nav-link"  href="{{route('Logout')}}">Logout </a>
		</li>
		@endsection

	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header ">
	        <h5 class="modal-title" id="basicExampleModal2">CREATE NEW VACANCY</h5>
	      
	      </div>
	      <form method="post" action="{{ route('Add-Vacancy-With-category') }}">
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
				    <input type="hidden" name="company_id" value="{{session()->get('company')->id}}"> 
				  </div>
	          
	          <h5 class="modal-title mb-3" id="exampleModalLabel">ASSIGN CATEGORY</h5>
			@foreach($categories as $category)
	          <select class="custom-select" multiple name="categories_id[]">
				  <option value="{{$category->id}}">{{$category->name}}</option>
				</select>
			@endforeach
		
	      	  <div class="modal-footer">
			        <button type="submit" class="btn btn-primary btn-block">Create</button>
			  </div>
			  </div>
	    </form>
	    <hr class="my-4">
	    <!---
	    <div class="row mt-5">
		            <div class="col" id="CategoryDiv">
		                <table class="table table-striped">
		                    <tbody>
		                    	
				                    <tr>
				                        <form action="{{route('assignCategory')}}" method="post">
				                        	@csrf
				                            <input type="hidden" value="{{session()->get('company')->id}}" name="company_id"/>
				                            <input type="hidden" value="{{$category->id}}" name="category_id"/>
				                            <td >{{$category->name}}</td>
				                            <td width="10%">
				                                <button class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
				                            </td>
				                        </form>
				                    </tr>
		                       
		                    </tbody>
		                </table>
		            </div>
		        </div>
		       --->
	    </div>
	  </div>
	
@endsection