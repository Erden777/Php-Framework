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
				 <a class="nav-link" href="{{route('Company-Profile')}}">{{session()->get('company')->company_name }}</a>
				 
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
	      <form method="post" action="{{ route('Edit-Vacancy-submit' , $vacancy->id) }}">
		      <div class="modal-body">
		      		@csrf
	                <div class="form-group">
	                  <label>Name</label>
	                  <input type="text" class="form-control" name="vacancy_name" value="{{$vacancy->name}}">
	                </div>
	                <div class="form-group">
	                  <label>Requirement</label>
	                    <textarea class="form-control" id="exampleFormControlTextarea1" name="requirement" rows="3">{{$vacancy->requirement}}</textarea>
	                </div>
	              <div class="form-group">
	                <label>Salary</label>
	                <input type="number" class="form-control" name="salary" value="{{$vacancy->salary}}">
	              </div>
	              <div class="form-group">
				    <input type="hidden" name="company_id" value="{{session()->get('company')->id}}"> 
				  </div>
	      	  <div class="modal-footer">
			        <button type="submit" class="btn btn-warning btn-block">Update</button>
			  </div>
			  </div>
	    </form>
	    <hr class="my-2">
	    	    <h5 class="modal-title mb-3 ml-3" id="exampleModalLabel">Categories</h5>
	    <div class="row mt-3">
		            <div class="col" id="CategoryDiv">
		                <table class="table table-striped">
		                    <tbody>
		                    	@foreach($vacancy_category as $vcategory)
		                    		
				                    <tr>
				                        <form action="{{route('dissignCategory')}}" method="post">
				                        	@csrf
				                        	<input type="hidden" value="{{$vacancy->id}}" name="vacancy_id"/>
				                            <input type="hidden" value="{{$vcategory->id}}" name="vCategory_id"/>
				                           
				                            <td >{{$vcategory->category->name}}</td>
				                            <td width="10%">
				                                <button class="btn btn-danger btn-sm"><i class="fas fa-minus"></i></button>
				                            </td>
				                        </form>
				                    </tr>
				                   
				                 @endforeach
		                    </tbody>
		                </table>
		            </div>
		        </div>
	    	
		          <hr class="my-2">
	    <h5 class="modal-title mb-3 ml-3" id="exampleModalLabel">ASSIGN CATEGORY</h5>
	    
	    <div class="row mt-3">
		            <div class="col" id="CategoryDiv">
		                <table class="table table-striped">
		                    <tbody>
		                
		                    		@foreach($categories as $category)
		                    			@if(!$vacancy_category->contains('category_id' , $category->id))
				                    <tr>
				                        <form action="{{route('assignCategory')}}" method="post">
				                        	@csrf
				                            <input type="hidden" value="{{$vacancy->id}}" name="vacancy_id"/>
				                            <input type="hidden" value="{{$category->id}}" name="category_id"/>
				                            <td >{{$category->name}}</td>
				                            <td width="10%">
				                                <button class="btn btn-info btn-sm"><i class="fas fa-plus"></i></button>
				                            </td>
				                        </form>
				                    </tr>
				                    @endif
				                 
				                @endforeach
		                    </tbody>
		                </table>
		            </div>
		        </div>
		        </div>
	    </div>
	  </div>
@endsection