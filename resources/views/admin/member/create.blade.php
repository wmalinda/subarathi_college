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
                        <form role="form" id="GradeCreate" method="post" action="{{ route('member-store') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="card-header">
                                <h3 class="card-title">{{$sub_page}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="inputName">Name in full</label>
                                    <input type="text" id="nameFull" name="name_full" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Name with initials</label>
                                    <input type="text" id="nameWithInitials" name="name_with_initials" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <div class="input-group date" id="dob" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#dob" name="dob"/>
                                        <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control select2" style="width: 100%;" id="gender" name="gender">
                                        <option value="">Select gender</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Member Role</label>
                                    <select class="form-control select2" style="width: 100%;" id="role" name="role" onchange="displayFeildByRole()">
                                        <option value="">Select role</option>
                                        <?php
                                            if(isset($memberRoles)){
                                                foreach($memberRoles as $role){
                                        ?>
                                                    <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
                                        <?php
                                                }

                                            }
                                        ?>
                                    </select>
                                </div>                    

                                <div id="studentData" style="display : none;">
                                    <div class="form-group">
                                        <label for="inputClientCompany">Admition Number</label>
                                        <input type="text" id="admitionNumber" name="admition_number" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Grade of admition</label>
                                        <select class="form-control select2" style="width: 100%;" id="GradeOfAdmition" name="grade_of_admition">
                                            <option value="">Select grade</option>
                                            <?php
                                                if(isset($grades)){
                                                    foreach($grades as $grd){
                                            ?>
                                                        <option value="<?php echo $grd['id'] ?>"><?php echo $grd['grade'] ?></option>
                                            <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Parent's Name</label>
                                        <input type="text" id="parentName" name="parent_name" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <textarea id="atuAddress" name="stu_address" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Contact Number - resident</label>
                                        <input type="text" id="stuContactNumber" name="stu_contact_number" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Mobile Number</label>
                                        <input type="text" id="stuMobileNumber" name="stu_mobile_number" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Email</label>
                                        <input type="text" id="stuEmail" name="stu_email" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Occupation</label>
                                        <input type="text" id="occupation" name="occupation" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Office Address</label>
                                        <input type="text" id="officeAddress" name="office_address" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Office Contact Number</label>
                                        <input type="text" id="officeContactNumber" name="office_contact_number" class="form-control" value="">
                                    </div>

                                </div>


                                <div id="staffData" style="display : none;">
                                    <div class="form-group">
                                        <label for="inputDescription">NIC Number</label>
                                        <input type="text" id="nic" name="nic" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <textarea id="staffAddress" name="staff_address" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Contact Number - resident</label>
                                        <input type="text" id="staffContactNumber" name="staff_contact_number" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Mobile Number</label>
                                        <input type="text" id="staffMobileNumber" name="staff_mobile_number" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Email</label>
                                        <input type="text" id="staffEmail" name="staff_email" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>marital status</label>
                                        <select class="form-control select2" style="width: 100%;" id="maritalStatus" name="marital_status" onchange="displayRelationData()">
                                            <option value="">Select marital status</option>
                                            <option value="MARRIED">Married</option>
                                            <option value="UNMARRIED">Un-married</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="spouseData" style="display : none;">
                                        <label for="inputDescription">Spouse's Name</label>
                                        <input type="text" class="form-control" id="spouseName" name="spouse_name" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Date of appointed</label>
                                        <div class="input-group date" id="doa" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#doa" name="doa"/>
                                            <div class="input-group-append" data-target="#doa" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Service Grade</label>
                                        <select class="form-control select2" style="width: 100%;" id="serviceGrade" name="service_grade">
                                            <option value="">Select grade</option>
                                            <?php
                                                if(isset($serviceGrades)){
                                                    foreach($serviceGrades as $serGrd){
                                            ?>
                                                        <option value="<?php echo $serGrd['id'] ?>"><?php echo $serGrd['name'] ?></option>
                                            <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Year of retierment</label>
                                        <div class="input-group date" id="yor" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#yor" name="yor"/>
                                            <div class="input-group-append" data-target="#yor" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profilePicture" name="profile_picture">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="checkbox" id="status" name="status" checked data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Membership Status</label>
                                    <div>
                                        <input type="checkbox" id="membershipStatus" name="membership_status" checked data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
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

    function displayFeildByRole(){
        var val = $("#role").val();
        if(val == 4){
            $('#studentData').css('display', 'block');
            $('#staffData').css('display', 'none');
        }else if(val == 1 || val == 2 || val == 3 || val == 5){
            $('#staffData').css('display', 'block');
            $('#studentData').css('display', 'none');
        }
    }

    function displayRelationData(){
        var val = $("#maritalStatus").val();
        if(val == 'MARRIED'){
            $('#spouseData').css('display', 'block');
        }else if(val == 'UNMARRIED'){
            $('#spouseData').css('display', 'none');
        }
    }
</script>
@endsection
