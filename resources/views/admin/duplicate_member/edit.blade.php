@extends('layouts.admin_app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-lg-6">
                    <div class="card card-primary">
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
                                <label for="inputDescription">Address</label>
                                <textarea id="address" name="address" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2" style="width: 100%;" id="role" name="role" onchange="displayFeildByRole()">
                                    <option value="">Select role</option>
                                    <option value="principle">Principle</option>
                                    <option value="wise_principle">Wise principle</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                

                            <div id="studentData" style="display : none;">
                                <div class="form-group">
                                    <label for="inputClientCompany">Admition Number</label>
                                    <input type="text" id="admitionNumber" name="admition_number" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Grade of admition</label>
                                    <input type="text" id="GradeOfAdmition" name="grade_of_admition" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Parent's Name</label>
                                    <input type="text" id="parentName" name="parent_name" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Contact Number - resident</label>
                                    <input type="text" id="contactNumber" name="contact_number" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Mobile Number</label>
                                    <input type="text" id="mobileNumber" name="mobile_number" class="form-control" value="">
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

                                <div class="form-group">
                                    <label for="inputDescription">Special Skils</label>
                                    <textarea class="textarea" id="specialSkils" name="special_skils" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                            </div>




                            <div id="staffData" style="display : none;">
                                <div class="form-group">
                                    <label for="inputDescription">NIC Number</label>
                                    <input type="text" id="nic" name="nic" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Contact Number - resident</label>
                                    <input type="text" id="contactNumber" name="contact_number" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Mobile Number</label>
                                    <input type="text" id="mobileNumber" name="mobile_number" class="form-control" value="">
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
                                        <option value="">Select Service Grade</option>
                                        <option value="MARRIED">Married</option>
                                        <option value="UNMARRIED">Un-married</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Height Education collification</label>
                                    <textarea class="textarea" id="heightEducationCollification" name="height_education_collification" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Height Proficinal collification</label>
                                    <textarea class="textarea" id="heightProficinalCollification" name="height_proficinal_collification" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Subjects</label>
                                    <select class="form-control select2" style="width: 100%;" id="subjects" name="subjects">
                                        <option value="">Select marital status</option>
                                        <option value="1">Married</option>
                                        <option value="2">Un married</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Special Responsibilities</label>
                                    <textarea class="textarea" id="specialResponsibilities" name="special_responsibilities" placeholder="Place some text here" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                    </div>
                </div>







                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Member Assignment</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Academic Year</label>
                                <div class="input-group date" id="yor" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#yor" name="yor"/>
                                    <div class="input-group-append" data-target="#yor" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control select2" style="width: 100%;" id="role" name="role" onchange="displayFeildByRole()">
                                    <option value="">Select role</option>
                                    <option value="principle">Principle</option>
                                    <option value="wise_principle">Wise principle</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                    </div>
                </div>
    </div>
  </div>
</section>
</div>
@endsection

@section('js')

@endsection
