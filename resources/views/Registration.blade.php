@extends('Admin_layout.Admin_layout')

@section('title')Registration Page @endsection

@section('main_content')

@include('inc.second_navbar')

<div class="container">
	<hr>
	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width:800px;">

			<h4 class="card-title mt-3 text-center">Create Account</h4>
			<p class="text-center">Get started with your free account</p>
			<p style="text-align: center">
				<a href="" class="btn btn-block btn-twitter"> <span class="fab fa-twitter" ></span><strong> Twitter</strong></a>
				<a href="" class="btn btn-block btn-facebook"> <span class="fab fa-facebook-f"></span><strong> Facebook</strong></a>
			</p>
			<p class="divider-text" style="text-align: center">
		        <span class="bg-light">OR</span>
		    </p>
		    @if($errors->any())
		    	<div class="alert alert-danger" >
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    @endif
			<form method="post" action="{{ route('register-form') }}" >
				@csrf
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
					 </div>
			        <input name="name" class="form-control" placeholder="Name" type="text">
			    </div> 
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" class="form-control" placeholder="Email address" type="email">
			    </div> 
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
					</div>
			    	<input name="number" class="form-control" placeholder="Phone number" type="number">
			    </div> 
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
					</div>
					<select class="form-control" style="margin-left: 0" name="job_type">
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
						
					</select>
				</div> <!-- form-group end.// -->
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input class="form-control" placeholder="Create password" name="password" type="password">
			    </div> <!-- form-group// -->
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input class="form-control" placeholder="Repeat password" name="repassword" type="password">
			    </div> <!-- form-group// -->                                      
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
			    </div> <!-- form-group// -->      
			    <p class="text-center"><a href="" style="color: black">Have an account?</a></p>                                                                 
			</form>
		</article>
	</div> 
</div> 
<hr>
@endsection
