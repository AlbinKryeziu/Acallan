<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <style>
    .carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

  </style>
  <div class="container">
    <img src="images/logo.jpg" alt="" style="width: 250px;">
    <button class="navbar-toggler  text-danger" type="button" id="nav-toggle-button"  data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">@lang('home')
                <span class="sr-only"></span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/about-us') }}">@lang('aboutUs')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/how-it-works') }}">@lang('howItWork')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contact-us') }}">@lang('contactUs')</a>
        </li>
        <li class="nav-item">
          <div class="dropdown nav-item">
            <button class="dropbtn">@lang('login')</button>
            <div class="dropdown-content">
                <a href="{{url('/login')}}">@lang('login')-@lang('doctor')</a>
                <a href="{{url('/login')}}">@lang('login')-@lang('client')</a>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lang/en">En</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="lang/es">Es</a>
        </li>
          </ul>
    </div>
  </div>
</nav>
