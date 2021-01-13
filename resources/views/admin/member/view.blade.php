@extends('layouts.admin_app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$sub_page}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="{{ url('/uploads/profile_pictures/6.jpg') }}" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">Waruna Malinda</h3>
                                            <p class="text-muted text-center">Principle</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Name In Full</b> <a class="float-right">Nupe Hewage Waruna Malinda</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>name_with_initials</b> <a class="float-right">N.H.W. Malinda</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>gender</b> <a class="float-right">Male</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>address</b> <a class="float-right">122/5, Godagama, Homagama.</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>phone</b> <a class="float-right">0112893582</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>mobile</b> <a class="float-right">0459360636</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>email</b> <a class="float-right">malinda.hewage@gmail.com</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>admition_number</b> <a class="float-right">LKR-14578952</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>grade_of_admition</b> <a class="float-right">Grade 1</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>parent_name</b> <a class="float-right">D.N. Hewage</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>occupation</b> <a class="float-right">Software Engineer</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>office_address</b> <a class="float-right">175/12, ljk mw, colombo 10.</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>office_contact_number</b> <a class="float-right">0114325745</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>nic</b> <a class="float-right">850142025V</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>marital_status</b> <a class="float-right">Married</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>spouse_name</b> <a class="float-right">K.D.I. Mauri</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>doa</b> <a class="float-right">K.D.I. Mauri</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>service_grade</b> <a class="float-right">K.D.I. Mauri</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>yor</b> <a class="float-right">K.D.I. Mauri</a>
                                                </li>
                                            </ul>
                                            <a href="#" class="btn btn-success btn-block"><b>status</b></a>
                                            <a href="#" class="btn btn-danger btn-block"><b>membership_status</b></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
                                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Personal Data</h3>
                                    <div class="text-center mt-5 mb-3" style="margin-top: 1rem !important;">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add New</button>
                                        <!-- <a href="#" class="btn btn-sm btn-primary">Add New</a> -->
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Height Education Collification</h3>
                                        </div>
                                        <div class="card-body">
                                            <strong>B.S.C. Hon</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>
                                            <strong>MSC</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>                                            
                                        </div>
                                    </div>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Height Proficinal Collification</h3>
                                        </div>
                                        <div class="card-body">
                                            <strong>B.S.C. Hon</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>
                                            <strong>MSC</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>                                            
                                        </div>
                                    </div>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Special Responsibilities</h3>
                                        </div>
                                        <div class="card-body">
                                            <strong>B.S.C. Hon</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>
                                            <strong>MSC</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>                                            
                                        </div>
                                    </div>

                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Special Skils</h3>
                                        </div>
                                        <div class="card-body">
                                            <strong>Education</strong>
                                            <p class="text-muted">B.S. in Computer Science from the University of Tennessee at Knoxville</p>
                                            <hr>
                                            <strong>Sport</strong>
                                            <p class="text-muted">Malibu, California</p>
                                            <hr>
                                            <strong>Other</strong>
                                            <p class="text-muted">
                                                <span class="tag tag-danger">UI Design</span>
                                                <span class="tag tag-success">Coding</span>
                                                <span class="tag tag-info">Javascript</span>
                                                <span class="tag tag-warning">PHP</span>
                                                <span class="tag tag-primary">Node.js</span>
                                            </p>
                                        </div>
                                    </div>

                                    


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- </div> -->


<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add new personal detail</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" id="GradeCreate" method="post" action="{{ route('member-store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control select2" style="width: 100%;" id="gender" name="gender">
                        <option value="">Select gender</option>
                        <option value="MALE">Male</option>
                        <option value="FEMALE">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Special Responsibilities</label>
                    <textarea class="textarea" id="specialResponsibilities" name="special_responsibilities" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
        $('.textarea').summernote()
    })

    $(function () {
        $('#yor').datetimepicker({
            format: 'YYYY',
            viewMode: 'years'
        });
    });

    $(function () {
        $('.date').datetimepicker({
            format: 'YYYY-MM-DD',
            viewMode: 'years'
        });
    });
</script>
@endsection
