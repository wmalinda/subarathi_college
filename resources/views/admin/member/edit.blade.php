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
                        <form role="form" id="GradeCreate" method="post" action="{{url('/admin/member').'/'.$memberData->id.'/update'}}" enctype="multipart/form-data">
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
                                    <input type="text" id="nameFull" name="name_full" class="form-control" value="<?php if(isset($memberData['name_full'])){ echo $memberData['name_full']; } ?>">
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Name with initials</label>
                                    <input type="text" id="nameWithInitials" name="name_with_initials" class="form-control" value="<?php if(isset($memberData['name_with_initials'])){ echo $memberData['name_with_initials']; } ?>">
                                </div>

                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <div class="input-group date" id="dob" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#dob" name="dob" value="<?php if(isset($memberData['dob'])){ echo $memberData['dob']; } ?>" />
                                        <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control select2" style="width: 100%;" id="gender" name="gender">
                                        <option value="">Select gender</option>
                                        <option value="MALE" <?php if(isset($memberData['gender']) && $memberData['gender'] == 'MALE'){ echo "selected"; } ?>>Male</option>
                                        <option value="FEMALE" <?php if(isset($memberData['gender']) && $memberData['gender'] == 'FEMALE'){ echo "selected"; } ?>>Female</option>
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
                                                    <option value="<?php echo $role['id'] ?>" <?php if(isset($memberData['member_role']) && $memberData['member_role'] == $role['id']){ echo "selected"; } ?>><?php echo $role['role'] ?></option>
                                        <?php
                                                }

                                            }
                                        ?>
                                    </select>
                                </div>                    

                                <div id="studentData" style="<?php if(isset($memberData['member_role']) &&  $memberData['member_role'] == '4'){ echo 'display : block;'; }else{ echo 'display : none;'; } ?>">
                                    <div class="form-group">
                                        <label for="inputClientCompany">Admition Number</label>
                                        <input type="text" id="admitionNumber" name="admition_number" class="form-control" value="<?php if(isset($memberData->MemberDetail['admition_number'])){ echo $memberData->MemberDetail['admition_number']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Grade of admition</label>
                                        <select class="form-control select2" style="width: 100%;" id="GradeOfAdmition" name="grade_of_admition">
                                            <option value="">Select grade</option>
                                            <?php
                                                if(isset($grades)){
                                                    foreach($grades as $grd){
                                            ?>
                                                        <option value="<?php echo $grd['id'] ?>" <?php if(isset($memberData->MemberDetail['grade_of_admition']) &&  $memberData->MemberDetail['grade_of_admition'] == $grd['id']){ echo 'selected'; } ?>><?php echo $grd['grade'] ?></option>
                                            <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Parent's Name</label>
                                        <input type="text" id="parentName" name="parent_name" class="form-control" value="<?php if(isset($memberData->MemberDetail['parent_name'])){ echo $memberData->MemberDetail['parent_name']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <textarea id="atuAddress" name="stu_address" class="form-control" rows="4"><?php if(isset($memberData['address'])){ echo $memberData['address']; } ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Contact Number - resident</label>
                                        <input type="text" id="stuContactNumber" name="stu_contact_number" class="form-control" value="<?php if(isset($memberData['phone'])){ echo $memberData['phone']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Mobile Number</label>
                                        <input type="text" id="stuMobileNumber" name="stu_mobile_number" class="form-control" value="<?php if(isset($memberData['mobile'])){ echo $memberData['mobile']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Email</label>
                                        <input type="text" id="stuEmail" name="stu_email" class="form-control" value="<?php if(isset($memberData['email'])){ echo $memberData['email']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Occupation</label>
                                        <input type="text" id="occupation" name="occupation" class="form-control" value="<?php if(isset($memberData->MemberDetail['occupation'])){ echo $memberData->MemberDetail['occupation']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Office Address</label>
                                        <input type="text" id="officeAddress" name="office_address" class="form-control" value="<?php if(isset($memberData->MemberDetail['office_address'])){ echo $memberData->MemberDetail['office_address']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Office Contact Number</label>
                                        <input type="text" id="officeContactNumber" name="office_contact_number" class="form-control" value="<?php if(isset($memberData->MemberDetail['office_contact_number'])){ echo $memberData->MemberDetail['office_contact_number']; } ?>">
                                    </div>

                                </div>


                                <div id="staffData" style="<?php if(isset($memberData['member_role']) &&  $memberData['member_role'] != 4){ echo 'display : block;'; }else{ echo 'display : none;'; } ?>">
                                    <div class="form-group">
                                        <label for="inputDescription">NIC Number</label>
                                        <input type="text" id="nic" name="nic" class="form-control" value="<?php if(isset($memberData->MemberDetail['nic'])){ echo $memberData->MemberDetail['nic']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Address</label>
                                        <textarea id="staffAddress" name="staff_address" class="form-control" rows="4"><?php if(isset($memberData['address'])){ echo $memberData['address']; } ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Contact Number - resident</label>
                                        <input type="text" id="staffContactNumber" name="staff_contact_number" class="form-control" value="<?php if(isset($memberData['phone'])){ echo $memberData['phone']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Mobile Number</label>
                                        <input type="text" id="staffMobileNumber" name="staff_mobile_number" class="form-control" value="<?php if(isset($memberData['mobile'])){ echo $memberData['mobile']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Email</label>
                                        <input type="text" id="staffEmail" name="staff_email" class="form-control" value="<?php if(isset($memberData['email'])){ echo $memberData['email']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>marital status</label>
                                        <select class="form-control select2" style="width: 100%;" id="maritalStatus" name="marital_status" onchange="displayRelationData()">
                                            <option value="">Select marital status</option>
                                            <option value="MARRIED" <?php if(isset($memberData->MemberDetail['marital_status']) && $memberData->MemberDetail['marital_status'] == 'MARRIED'){ echo 'selected'; } ?>>Married</option>
                                            <option value="UNMARRIED" <?php if(isset($memberData->MemberDetail['marital_status']) && $memberData->MemberDetail['marital_status'] == 'UNMARRIED'){ echo 'selected'; } ?>>Un-married</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="spouseData" style="display : none;">
                                        <label for="inputDescription">Spouse's Name</label>
                                        <input type="text" class="form-control" id="spouseName" name="spouse_name" value="<?php if(isset($memberData->MemberDetail['spouse_name'])){ echo $memberData->MemberDetail['spouse_name']; } ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Date of appointed</label>
                                        <div class="input-group date" id="doa" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#doa" name="doa" value="<?php if(isset($memberData->MemberDetail['doa'])){ echo $memberData->MemberDetail['doa']; } ?>" />
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
                                                        <option value="<?php echo $serGrd['id'] ?>" <?php if(isset($memberData->MemberDetail['service_grade']) && $memberData->MemberDetail['service_grade'] == $serGrd['id']){ echo 'selected'; } ?>><?php echo $serGrd['name'] ?></option>
                                            <?php
                                                    }

                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Year of retierment</label>
                                        <div class="input-group date" id="yor" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#yor" name="yor" value="<?php if(isset($memberData->MemberDetail['yor'])){ echo $memberData->MemberDetail['yor']; } ?>" />
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
                                    <?php if(isset($memberData['profile_picture'])){
                                        echo '<img class="img-fluid" src="'.url($memberData['profile_picture']).'" width="250">';
                                    } ?>
                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <div>
                                        <input type="checkbox" id="status" name="status" <?php if($memberData['status'] == 1){ echo 'checked'; } ?> data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Membership Status</label>
                                    <div>
                                        <input type="checkbox" id="membershipStatus" name="membership_status" <?php if($memberData['membership_status'] == 1){ echo 'checked'; } ?> data-toggle="toggle" data-on="Actice" data-off="Dactive" data-onstyle="success" data-offstyle="danger">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
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
