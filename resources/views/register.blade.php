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
    <h1>Register</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- Register Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <div class="contact-form loginWrp registerWrp">
          <form id="contactForm" novalidate="">
            <div class="form_set">
              <h3>Account Information</h3>
              <div class="form-group">
                <input type="email" name="Username" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="text" name="password" class="form-control" placeholder="Password">
                <div class="passnote">Note:  Password must be a minimum of 8 characters</div>
              </div>
              <div class="form-group">
                <input type="text" name="password" class="form-control" placeholder="Confirm Password">
              </div>
            </div>
            <h3>Personal Information</h3>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="email" name="name" class="form-control" placeholder="First Name">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="email" name="name" class="form-control" placeholder="Last Name">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="email" name="phone" class="form-control" placeholder="Phone">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <input type="email" name="class" class="form-control" placeholder="Class">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn"> Log in to my account <span></span></button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="already_account">Already have Account? <a href="#">Login</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Register End --> 
    
  </div>
</div>

@endsection
@section('js')
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
@endsection