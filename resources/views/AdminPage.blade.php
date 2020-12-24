 	@extends('Admin_layout.newadmin_layout')

@section('title')Admin Page @endsection

@section('main_content')

<div class="container-fluid">
	<div class="row mt-5">

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card Primary -->
            <div class="card classic-admin-card bg-primary">
              <div class="card-body">
                <div class="pull-right">
                  <i class="far fa-money-bill-alt fa-2x"></i>
                </div>
                <p class="white-text mt-1" style="color: white">VACANCIES</p>
                <h4 style="color: white">{{$vacancysize}}</h4>

              </div>
              <div class="progress">
                <div class="progress-bar bg-secondary" role="progressbar"  style="width:{{$vacancysize}}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="card-body">
                 <p style="color: white">Average salary: {{intval($avaragesalary)}} KZT</p>
              </div>
            </div>
            <!-- Card Primary -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card Yellow -->
            <div class="card classic-admin-card bg-warning">
              <div class="card-body">
                <div class="pull-right">
                  <i class="fas fa-chart-line fa-2x"></i>
                </div>
                <p class="white-text mt-1" style="color: white">SUBSCRIPTIONS</p>
                <h4 style="color: white">{{$usersize}}</h4>
              </div>
              <div class="progress">
                <div class="progress-bar bg grey darken-3" role="progressbar" style="width:{{$usersize}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="card-body">
               	<p style="color: white">All users</p>
              </div>
            </div>
            <!-- Card Yellow -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card Blue -->
            <div class="card classic-admin-card bg-success">
              <div class="card-body">
                <div class="pull-right">
                  <i class="fas fa-chart-pie fa-2x"></i>
                </div>
                <p class="white-text mt-1" style="color: white">EMPLOYEE</p>
                <h4 style="color: white">{{$confirmsize}}</h4>
              </div>
              <div class="progress">
                <div class="progress-bar bg grey darken-4" role="progressbar" style="width:{{$confirmsize}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="card-body">
               	<p style="color: white">Employee</p>
              </div>
            </div>
            <!-- Card Blue -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card Red -->
            <div class="card classic-admin-card bg-danger accent-2">
              <div class="card-body">
                <div class="pull-right">
                  <i class="fas fa-chart-bar fa-2x"></i>
                </div>
                <p class="white-text mt-1" style="color: white ">JOB APPLICANTS</p>
                <h4 style="color: white">{{$requestsize}}</h4>
              </div>
              <div class="progress">
                <div class="progress-bar bg grey darken-4" role="progressbar" style="width: {{$requestsize}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="card-body">
               	<p style="color: white">job applicants</p>
              </div>
            </div>
            <!-- Card Red -->

          </div>
          <!-- Grid column -->

        </div>
</div>
@endsection




