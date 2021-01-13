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
    <h1>Login</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- Logn Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <h3>New Customers</h3>
        <p>If you don't have an account, please proceed by clicking the following button to continue first-time registration.</p>
        <div class="form-group">
          <button type="submit" class="default-btn btn send_btn">Create Account <span></span></button>
        </div>
        <div class="contact-form loginWrp">
          <h3>Login Customers</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <form id="contactForm" novalidate="" method="POST" action="{{ route('login') }}">
          @csrf
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <input type="text" name="user_name" class="form-control" placeholder="User Name">
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn"> Log in to my account <span></span></button>
                </div>
                <div class="form-group">
                  <div class="forgot_password"><a href="#">Reset My Password</a></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Login End --> 
    
  </div>
</div>

@endsection
@section('js')
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
@endsection