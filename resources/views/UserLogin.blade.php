@extends('Admin_layout.Admin_layout')

@section('title')Login in @endsection

@section('main_content')

@include('inc.second_navbar')
<div class="container">
	<hr>
	<div class="card bg-light">
		<article class="card-body mx-auto" style="max-width: 400px;">
			<h4 class="card-title mt-3 text-center">Login in</h4>
		    <br>
			<form method="get" action="{{route('LogininSubmit')}}">
				@csrf
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" class="form-control" placeholder="Email" type="email">
			    </div> 
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input class="form-control" placeholder="Password" type="password" name="password">
			    </div> 
			     <div class="input-group-text">
				      <input type="checkbox" name="isUser" value="1" aria-label="Checkbox for following text input">
				    </div>                                   
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Login </button>
			    </div>
			    <p class="text-center"><a href="/register" style="color: black">Don't have an account?</a></p> 
			</form>
		</article>
	</div> 
</div> 
	

@endsection
