@extends('layouts.admin_app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$sub_page}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form role="form" id="GradeCreate" method="post" action="{{ route('grade-store') }}">
                            {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Grade</label>
                                    <input type="text" id="Grade" name="grade" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Description</label>
                                    <textarea id="GradeDescription" name="description" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="checkbox" id="status" name="status" checked data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- </div> -->
@endsection

@section('js')
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@endsection
