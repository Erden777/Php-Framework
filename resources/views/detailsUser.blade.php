@extends('Admin_layout.Admin_layout')

@section('title')Admin Page @endsection

@section('main_content') 
	<div class="container" layout:fragment="main_admin_content">
	    <div role="main">
	        <div class="container">
	            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 ">
	                <h1 class="h2" th:text="${item.getName()}"></h1>
	            </div>
	            <form action="#" method="post">
		            <input type="hidden" name="itemId" th:value="{{ $user->id}}">
		                <div class="modal-body">
		                    <div class="form-group">
		                        <label >Full name</label>
		                        <input type="text" class="form-control" name="name" value="{{$user->full_name}}">
		                    </div>
		                    <div class="form-group">
		                        <label>Telephone number</label>
		                        <input type="text" class="form-control" name="name" value="{{$user->tel_number}}">
		                    </div>
		                    <div class="form-group">
		                        <label >Email</label>
		                        <input type="text" class="form-control" name="name" value="{{$user->email}}">
		                    </div>
		                    
		                </div>
		                <div class="modal-footer">
		                    <button type="submit" class="btn btn-success" >Save</button>
		                    <button type="button"  class="btn-sm btn-danger">Delete</button>
		                </div>
	            
	        	</form>
	   		 </div>
        </div>
	</div>
@endsection




