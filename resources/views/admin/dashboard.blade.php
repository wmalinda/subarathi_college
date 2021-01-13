@extends('layouts.admin_app')
@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>123</h3>
                <p>Total Uploaded Videos</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-film"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>123</sup></h3>
                <p>Total Video Views</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-eye"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>123</h3>
                <p>Total Subscribed Videos</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-chatbubble"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>123</h3>
                <p>Total Income</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <section class="col-lg-8 connectedSortable">
        
          </section>
        </div>
@endsection

@section('js')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
@endsection
