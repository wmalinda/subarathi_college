@extends('layouts.app')
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
            <h1>Online Learing <span>PLatform</span></h1>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, pulvinar rhoncus risus. Fusce vel rutrum mi.</p>
          <ul class="edu_list">
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{ asset('assets/images/education.png') }}"></div>
                <div class="learn_info">
                  <h3>Special Education</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{ asset('assets/images/class.png') }}"></div>
                <div class="learn_info">
                  <h3>Honors classes</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="{{ asset('assets/images/academy.png') }}"></div>
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

<!-- Gallery Start -->
<div class="gallery-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="gallery_box">
          <div class="gallery_left">
            <div class="title">
              <h1>Photo Gallery</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur.</p>
            <div class="readmore"><a href="#">View All Gallery</a></div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-1.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-1.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-2.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-2.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-3') }}.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-3.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-4.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-4.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-5.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-5.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="{{ asset('assets/images/gallery-6.jpg') }}" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="{{ asset('assets/images/gallery-6.jpg') }}" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery End --> 

<!-- Testimonials Start -->
<div class="testimonials-wrap ">
  <div class="container">
    <div class="title">
      <p>Testimoinials</p>
      <h1> What Parents Say </h1>
    </div>
    <ul class="owl-carousel testimonials_list unorderList">
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/comment-img-1.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/comment-img-2.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere. </p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/comment-img-3.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="images/comment-img-1.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Testimonials End --> 

<!-- Enroll Start -->
<div class="choice-wrap enroll-wrap ">
  <div class="container">
    <div class="title">
      <h1>Call To Enroll Your Child</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at eleifend est. Donec dictum at diam ut finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent.</p>
    <div class="phonewrp"><img src="images/phone_icon.png"><a href="#">(770) 132 4657</a></div>
  </div>
</div>
<!-- Enroll End --> 

<!-- Teacher Start -->
<section class="teachers-area-three teacher-wrap pt-100 pb-70">
  <div class="container">
    <div class="title center_title">
      <h1>Our Teachers</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="images/teachers01.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Stella Roffin</h3>
            <div class="designation">Art teacher</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="images/teachers02.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Chris Miller</h3>
            <div class="designation">Mathematic</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="images/teachers03.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Jesica Matt</h3>
            <div class="designation">English Teacher</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="images/teachers04.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Lena Bodie</h3>
            <div class="designation">Science Teacher</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Teacher Start --> 

<!--Newsletter Start-->
<div class="newsletter-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="title">
          <h1>Newsletter</h1>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
      </div>
      <div class="col-lg-6">
        <div class="news-info">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Email Address">
              <div class="form_icon"><i class="fas fa-envelope"></i></div>
            </div>
            <button class="sigup">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Newsletter End--> 

@endsection