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
                                                <img class="profile-user-img img-fluid img-circle" src="<?php if(isset($memberData['profile_picture'])){ echo url($memberData['profile_picture']); } ?>" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center"><?php if(isset($memberData['name_with_initials'])){ echo $memberData['name_with_initials']; } ?></h3>
                                            <p class="text-muted text-center"><?php if(isset($memberData->MemberRole['role'])){ echo $memberData->MemberRole['role']; } ?></p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Name In Full</b> <a class="float-right"><?php if(isset($memberData['name_full'])){ echo $memberData['name_full']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>name_with_initials</b> <a class="float-right"><?php if(isset($memberData['name_with_initials'])){ echo $memberData['name_with_initials']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>gender</b> <a class="float-right"><?php if(isset($memberData['gender'])){ echo $memberData['gender']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>address</b> <a class="float-right"><?php if(isset($memberData['address'])){ echo $memberData['address']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>phone</b> <a class="float-right"><?php if(isset($memberData['phone'])){ echo $memberData['phone']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>mobile</b> <a class="float-right"><?php if(isset($memberData['mobile'])){ echo $memberData['mobile']; } ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>email</b> <a class="float-right"><?php if(isset($memberData['email'])){ echo $memberData['email']; } ?></a>
                                                </li>
                                                <?php if($memberData->MemberRole['role'] == 'Student'){ ?>
                                                    <li class="list-group-item">
                                                        <b>admition_number</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['admition_number'])){ echo $memberData->MemberDetail['admition_number']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>grade_of_admition</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['grade_of_admition'])){ echo $memberData->MemberDetail['grade_of_admition']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>parent_name</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['parent_name'])){ echo $memberData->MemberDetail['parent_name']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>occupation</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['occupation'])){ echo $memberData->MemberDetail['occupation']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>office_address</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['office_address'])){ echo $memberData->MemberDetail['office_address']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>office_contact_number</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['office_contact_number'])){ echo $memberData->MemberDetail['office_contact_number']; } ?></a>
                                                    </li>
                                                <?php }else{ ?>
                                                    <li class="list-group-item">
                                                        <b>nic</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['nic'])){ echo $memberData->MemberDetail['nic']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>marital_status</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['marital_status'])){ echo $memberData->MemberDetail['marital_status']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>spouse_name</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['spouse_name'])){ echo $memberData->MemberDetail['spouse_name']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>doa</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['doa'])){ echo $memberData->MemberDetail['doa']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>service_grade</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['service_grade'])){ echo $memberData->MemberDetail['service_grade']; } ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>yor</b> <a class="float-right"><?php if(isset($memberData->MemberDetail['yor'])){ echo $memberData->MemberDetail['yor']; } ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <a href="#" class="btn <?php if(isset($memberData['status']) && $memberData['status'] == 1){ echo 'btn-success'; }elseif(isset($memberData['status']) && $memberData['status'] == 0){ echo 'btn-danger'; } ?> btn-block"><b>status</b></a>
                                            <a href="#" class="btn <?php if(isset($memberData['membership_status']) && $memberData['membership_status'] == 1){ echo 'btn-success'; }elseif(isset($memberData['membership_status']) && $memberData['membership_status'] == 0){ echo 'btn-danger'; } ?> btn-block"><b>membership status</b></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
                                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Personal Data</h3>
                                    <div class="text-center mt-5 mb-3" style="margin-top: 1rem !important;">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#memberPersonalDataCreateMmodal">Add New</button>
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#memberDataCreateModal">Data</button> --}}
                                        <button type="button" class="btn btn-primary" onclick="loadDataModel()">Data</button>
                                    </div>
                                    <?php
                                    if(isset($getPersonalData) && count($getPersonalData) > 0){
                                        foreach($getPersonalData as $personalData){
                                    ?>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title"><?php echo $personalData[0]->PersonalDataType['type']; ?></h3>
                                                </div>
                                                <div class="card-body">
                                                    <?php foreach($personalData as $pd){ ?>
                                                        <strong><?php if(isset($pd['title'])){ echo $pd['title']; } ?></strong>
                                                        <p class="text-muted"><?php if(isset($pd['description'])){ echo $pd['description']; } ?></p>
                                                        <hr>
                                                    <?php } ?>                                            
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- </div> -->


<div class="modal fade" id="memberPersonalDataCreateMmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new personal detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="memberPersonalDataCreate" method="post" action="{{url('/admin/member-personal-data').'/'.$memberData['id'].'/store'}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control select2" style="width: 100%;" id="type" name="type">
                            <option value="">Select type</option>
                            <?php
                                if(isset($getPersonalDataType)){
                                    foreach($getPersonalDataType as $type){
                            ?>
                                        <option value="<?php echo $type['id'] ?>"><?php echo $type['type'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea class="textarea" id="description" name="description" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <input type="checkbox" id="status" name="status" checked data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="memberDataCreateModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="memberDataCreate" method="post" action="{{url('/admin/member-data').'/'.$memberData['id'].'/store'}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="modal-body" id="memberDataCreateBody">



                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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

    function memberData(){

    }

    function loadDataModel(){
        console.log('ddd');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: admin_url+'get-enabled-academic-year',
            type: "POST",
            success: function(data){
                if(data != ''){
                    var content = '<div class="form-group">'+
                        '<label>Academic Year</label>'+
                        '<select class="form-control select2" style="width: 100%;" id="academic_year" name="academic_year" onchange="loadGrades();">'+
                            '<option value="">Select Academic Year</option>';
                    for(i = 0; i < data.length; i++){
                        content += '<option value="'+data[i].id+'">'+data[i].academic_year+'</option>';
                    }

                    content += '</select>'+
                        '</div>';
                    $("#memberDataCreateBody").append(content);
                    $('.select2').select2();
                    $('#memberDataCreateModal').modal('show');
                }else{
                    swall('Fail', 'Invalied request', 'danger', 2500, false);
                }
            }
        });
    }

    function loadGrades(){
        console.log('ddd');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: admin_url+'get-enabled-grades',
            type: "POST",
            success: function(data){
                if(data != ''){
                    var content = '<div class="form-group">'+
                        '<label>Grade</label>'+
                        '<select class="form-control select2" style="width: 100%;" id="grade" name="grade" onchange="loadClasses();">'+
                            '<option value="">Select Grade</option>';
                    for(i = 0; i < data.length; i++){
                        content += '<option value="'+data[i].id+'">'+data[i].grade+'</option>';
                    }

                    content += '</select>'+
                        '</div>';
                    $("#memberDataCreateBody").append(content);
                    $('.select2').select2();
                }else{
                    swall('Fail', 'Invalied request', 'danger', 2500, false);
                }
            }
        });
    }

    function loadClasses(){
        var grade = $('#grade').val()
        console.log(grade);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: admin_url+'get-enabled-classes-by-grade-id',
            type: "POST",
            data: {
                'grade' : grade
            },
            success: function(data){
                if(data != ''){
                    var content = '<div class="form-group">'+
                        '<label>Class</label>'+
                        '<select class="form-control select2" style="width: 100%;" id="class" name="class" data-placeholder="Select the Class" onchange="checkAlreadyAdded();">'+
                            '<option value="">Select Class</option>';
                    for(i = 0; i < data.length; i++){
                        content += '<option value="'+data[i].id+'">'+data[i].class+'</option>';
                    }

                    content += '</select>'+
                        '</div>';
                    $("#memberDataCreateBody").append(content);
                    $('.select2').select2();
                }else{
                    swall('Fail', 'Invalied request', 'danger', 2500, false);
                }
            }
        });
    }

    function loadSubjects(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: admin_url+'get-enabled-subjects',
            type: "POST",
            success: function(data){
                if(data != ''){
                    var content = '<div class="form-group">'+
                        '<label>Subjects</label>'+
                        '<select class="form-control select2" style="width: 100%;" id="subject" name="subject" multiple="multiple" data-placeholder="Select the Subjects">';
                    for(i = 0; i < data.length; i++){
                        content += '<option value="'+data[i].id+'">'+data[i].subject+'</option>';
                    }

                    content += '</select>'+
                        '</div>';
                    $("#memberDataCreateBody").append(content);
                    $('.select2').select2();
                }else{
                    swall('Fail', 'Invalied request', 'danger', 2500, false);
                }
            }
        });
    }

    function checkAlreadyAdded(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: admin_url+'get-enabled-subjects',
            type: "POST",
            success: function(data){
                if(data != ''){
                    var content = '<div class="form-group">'+
                        '<label>Subjects</label>'+
                        '<select class="form-control select2" style="width: 100%;" id="subject" name="subject" multiple="multiple" data-placeholder="Select the Subjects">';
                    for(i = 0; i < data.length; i++){
                        content += '<option value="'+data[i].id+'" selected=""selected>'+data[i].subject+'</option>';
                    }

                    content += '</select>'+
                        '</div>';
                    $("#memberDataCreateBody").append(content);
                    $('.select2').select2();
                }else{
                    loadSubjects();
                }
            }
        });
    }
</script>
@endsection
