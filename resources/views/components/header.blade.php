<!--Header Start-->
<div class="header-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-12 navbar-light">
        <div class="logo" style="text-align: center;"> <a href="#"><img alt="" class="logo-default" src="{{ asset('assets/images/sulogo.jpg') }}" style="height: 75px;"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-lg-7 col-md-12">
        <div class="navigation-wrap" id="filters">
          <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="{{ url('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Classes</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="#">Classes</a></li>
                    <li><a href="#">Classes Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Teachers</a>
                  <ul class="submenu">
                    <li><a href="#">Teachers</a></li>
                    <li><a href="#">Teachers Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#.">Pages</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Teachers</a></li>
                    <!-- <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Our Pricing</a></li>
                    <li><a href="#">Faqs</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">404</a></li> -->
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Blog</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="#">Blog</a></li>
                    <!-- <li><a href="#">Blog Grid Sidebar</a></li>
                    <li><a href="#">Blog List sidebar</a></li> -->
                    <li><a href="#">Blog Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="header_info" style="float: left;">
          <div class="search"><a href="#"><i class="fas fa-search"></i></a></div>
          <div class="loginwrp"><a href="{{ url('/log-in') }}">Login/Register</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Header End--> 