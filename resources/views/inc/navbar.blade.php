@section('navbar')
<div class="header frontpage" style="background-color:#EFF3F8;">
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light " style="height:80px;">
    <a class="navbar-brand" href="{{route('/')}}">EMPLOYMENT.COM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('find-job')}}">Find a job</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            Find an employee
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Employment services</a>
            <a class="dropdown-item" href="#">Career guidance</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Analysis</a>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Help</a>
        </li>

      </ul>
        <ul class="navbar-nav">@show</ul>
    </div>
  </nav>
  </div>
</div>