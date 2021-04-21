@extends('layouts.app')
@section('css')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
<link href="{{ asset('assets/css/custom_sidebar_navi.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>About Us</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<!-- About Start -->
<div class="about-wrap " id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="nav-side-menu">
          <!-- <div class="brand">Press Curing Control</div> -->
          <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        
            <div class="menu-list">
      
              <ul id="menu-content" class="menu-content collapse out">
                <!-- <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li> -->

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <!-- <a href="#"><i class="fa fa-gift fa-lg"></i> Overview <span class="arrow"></span></a> -->
                  <a href="#"><i class="fa fa-gift fa-lg"></i> Overview </a>
                </li>
                <!-- <ul class="sub-menu collapse" id="products">
                  <li class="active"><a href="#">RFT-H1</a></li>
                  <li><a href="#">RFT-H2</a></li>
                  <li><a href="#">BTB-H1</a></li>
                  <li><a href="#">BTB-H2</a></li>
                </ul> -->


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-globe fa-lg"></i>  History </a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li> Brief History </li>
                  <li> Founders </li>
                  <li> Past Principals </li>
                </ul>


                <li data-toggle="collapse" data-target="#reporting" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i>  Identity </a>
                </li>
                <ul class="sub-menu collapse" id="reporting">
                  <li> Motto </li>
                  <li> Emblem </li>
                  <li> Flag </li>
                  <li> Anthem </li>
                  <li>  Houses </li>
                </ul>


                <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                </li>

                <!-- <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-car fa-lg"></i> Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>Sensorkonfiguration</li>
                  <li>Betriebsarten</li>
                </ul> -->

              </ul>
            </div>
        </div>
      </div>

      <div class="col-lg-8 ">
        <div class="class_left">
          <div class="class_Img"><img src="{{ asset('assets/images/large_img.jpg') }}" alt="">
            <!-- <div class="time_box"><span>08:00 am - 10:00 am</span></div> -->
          </div>
          <h3>Subharathi Mahamathya Maha Vidyalaya</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec placerat elit in turpis tempus placerat. Aenean consectetur non metus sollicitudin sodales. Vestibulum blandit nunc in neque gravida, nec euismod libero sagittis. Sed venenatis consectetur tellus, eu lacinia mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam sed turpis tincidunt odio sagittis tristique. Donec placerat nibh in euismod eleifend. Aliquam fringilla suscipit varius. Mauris a lacus ac metus eleifend gravida. Curabitur rutrum ante ac egestas hendrerit. Aliquam interdum, eros a lobortis dapibus, leo ligula viverra erat, nec vehicula nunc neque a sem. Integer nibh dui, vehicula ac rutrum vel, pharetra at velit.</p>
          <p>Sed vitae aliquam tortor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed non nisl a nisi condimentum cursus eu vel nisi. Aenean dignissim diam vel faucibus dignissim. Pellentesque luctus odio id magna tincidunt eleifend. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis mattis sit amet magna et convallis. Suspendisse eget neque lorem. Fusce maximus justo nec turpis mattis, non bibendum nulla scelerisque. Aliquam erat volutpat. Nunc enim eros, finibus eu commodo non, consequat in nunc. Nulla nulla ipsum, lacinia a felis vitae, viverra posuere libero. Sed accumsan dui neque, at porttitor felis ullamcorper sit amet. Vivamus ac ligula quam. Proin efficitur auctor venenatis. Duis nec quam tortor.</p>
          <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices, orci eu cursus ultricies, purus ex pulvinar risus, sit amet dignissim nisi magna quis ex. Donec aliquam odio egestas consequat</blockquote>
          <p>Phasellus nunc neque, volutpat ac urna vitae, fermentum sodales velit. Nam convallis tellus nec libero facilisis tincidunt. Nullam et consectetur metus. Pellentesque in volutpat eros. Morbi tempor tempus laoreet. Fusce in ante in dolor imperdiet malesuada ac et nunc. Sed sed pellentesque sem, eget eleifend metus. Maecenas ac purus sed augue tempor eleifend. Curabitur volutpat nunc sed massa egestas euismod. Quisque facilisis eros in nunc volutpat dignissim. Praesent in nibh velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dignissim, elit eget luctus feugiat, ligula ipsum pellentesque lacus, non lacinia enim tortor vel lorem.</p>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- About End --> 

@endsection
@section('js')
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
@endsection