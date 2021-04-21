@extends('layouts.app')
@section('css')

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
      <div class="col-lg-7">
        <div class="aboutImg"><img src="{{ asset('assets/images/aboutImg.png') }}" alt=""></div>
      </div>
      <div class="col-lg-5">
        <div class="about_box">
          <div class="title">
            <h1 style="font-size: 36px;">Breaf Of <span>Subharathi Vidyalaya</span></h1>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, pulvinar rhoncus risus. Fusce vel rutrum mi.</p>
          <ul class="edu_list">
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="images/education.png"></div>
                <div class="learn_info">
                  <h3>Special Education</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="images/class.png"></div>
                <div class="learn_info">
                  <h3>Honors classes</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="images/academy.png"></div>
                <div class="learn_info">
                  <h3>Traditional academies</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About End --> 

<!-- Enroll Start -->
<div class="choice-wrap enroll-wrap ">
  <div class="container">
    <div class="title">
      <h1>Breaf History</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at eleifend est. Donec dictum at diam ut finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent.</p>
    {{-- <div class="phonewrp"><img src="images/phone_icon.png"><a href="#">(770) 132 4657</a></div> --}}
  </div>
</div>
<!-- Enroll End -->


<div class="innerContent-wrap">
  <div class="container"> 
    <div class="title" style="text-align: center;">
      <h1 style="color: #000;">Vision And Mission</h1>
    </div>
    
    <!-- Testimonials Start -->
    <div class="testimonials-wrap">
      <ul class="row  unorderList">
        <li class="col-lg-6 ">
          <div class="testimonials_sec">
            {{-- <div class="client_box">
              <div class="clientImg"><img alt="" src="images/comment-img-1.jpg"></div>
              <ul class="unorderList starWrp">
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
              </ul>
            </div> --}}
            <h3>Our Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
            
            <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          </div>
        </li>
        <li class="col-lg-6 ">
          <div class="testimonials_sec">
            {{-- <div class="client_box">
              <div class="clientImg"><img alt="" src="images/comment-img-2.jpg"></div>
              <ul class="unorderList starWrp">
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
              </ul>
            </div> --}}
            <h3>Our Mission</h3>
            <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere. </p>
            
            <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
          </div>
        </li>
      </ul>
    </div>
    <!-- Testimonials End --> 
  </div>
</div>


<!-- Gallery Start -->
<div class="gallery-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="gallery_box">
          <div class="gallery_left">
            <div class="title">
              <h1>School Logo</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur.</p>
            {{-- <div class="readmore"><a href="#">View All Gallery</a></div> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          {{-- <div class="col-lg-4 col-md-6"> --}}
            <div class="galleryImg" style="width: 100%;"><img src="{{ asset('assets/images/sulogo.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/sulogo.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery End --> 


<!-- Teacher Start -->
<section class="teachers-area-three teacher-wrap pt-100 pb-70">
  <div class="container">
    <div class="title center_title">
      <h1 style="color: #000;">School organizing Chart</h1>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <img src="{{ asset('assets/images/chart/chart1.jpg') }}" alt="" style="width: 100%;">
      </div>
    </div>
  </div>
</section>

<!-- Teacher Start --> 


@endsection
@section('js')

@endsection