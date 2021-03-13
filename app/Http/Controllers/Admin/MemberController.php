<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Member\Services\MemberService;
use App\Modules\Grade\Services\GradeService;
use App\Modules\AcademicYear\Services\AcademicYearService;
use App\Modules\Member\Models\Member;
use App\Modules\Member\Models\MemberDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class MemberController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->memberService = new MemberService();
        $this->gradeService = new GradeService();
        $this->academicYearService = new AcademicYearService();
    }

    public function index(){
        $data['title'] = 'Member Management';
        $data['slug'] = 'member-list';
        $data['sub_page'] = 'Member List';
        return view('admin.member.index', $data);
    }

    public function data(DataTables $datatables){
        $query = Member::with('MemberDetail', 'MemberRole');

        return $datatables->eloquent($query)
            ->addColumn('status', function (Member $member){
                if($member->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('membership_status', function (Member $member){
                if($member->membership_status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('role', function (Member $member){
                return $member->MemberRole->role;
            })

            ->addColumn('action', function (Member $member) {
                $editURl = url('admin/member/' . $member->id . '/edit');
                $dltURl = url('admin/member/' . $member->id . '/delete');
                $viewURl = url('admin/member/' . $member->id . '/view');
                
                return '<a href="' . $viewURl . '" class="btn btn-sm btn-success ">View <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status', 'membership_status', 'role'])
            ->make(true);
    }

    public function students(){
        $data['title'] = 'Member Management';
        $data['slug'] = 'student-list';
        $data['sub_page'] = 'Student List';
        return view('admin.member.student', $data);
    }

    public function studentsData(DataTables $datatables){
        $query = Member::with('MemberDetail')->where('member_role', 4);

        return $datatables->eloquent($query)
            ->addColumn('status', function (Member $member){
                if($member->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('membership_status', function (Member $member){
                if($member->membership_status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('admition_number', function (Member $member){
                return $member->MemberDetail->admition_number;
            })

            ->addColumn('action', function (Member $member) {
                $editURl = url('admin/member/' . $member->id . '/edit');
                $dltURl = url('admin/member/' . $member->id . '/delete');
                $viewURl = url('admin/member/' . $member->id . '/view');
                
                return '<a href="' . $viewURl . '" class="btn btn-sm btn-success ">View <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status', 'membership_status'])
            ->make(true);
    }

    public function staff(){
        $data['title'] = 'Member Management';
        $data['slug'] = 'staff-list';
        $data['sub_page'] = 'Staff List';
        return view('admin.member.staff', $data);
    }

    public function staffData(DataTables $datatables){
        $query = Member::with('MemberDetail')->whereIn('member_role', [1,2,3,5]);

        return $datatables->eloquent($query)
            ->addColumn('status', function (Member $member){
                if($member->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('membership_status', function (Member $member){
                if($member->membership_status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('nic', function (Member $member){
                return $member->MemberDetail->nic;
            })

            ->addColumn('action', function (Member $member) {
                $editURl = url('admin/member/' . $member->id . '/edit');
                $dltURl = url('admin/member/' . $member->id . '/delete');
                $viewURl = url('admin/member/' . $member->id . '/view');
                
                return '<a href="' . $viewURl . '" class="btn btn-sm btn-success ">View <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status', 'membership_status', 'nic'])
            ->make(true);
    }

    public function create(){
        $data['memberRoles'] = $this->memberService->getEnabledMemberRoles();
        $data['serviceGrades'] = $this->gradeService->getEnabledServiceGrades();
        $data['grades'] = $this->gradeService->getEnabledGrades();
        $data['title'] = 'Member Management';
        $data['slug'] = 'create-member';
        $data['sub_page'] = 'Create Member';
        return view('admin.member.create', $data);
    }

    public function store(Request $request){
        $member = $this->memberService->createMember($request);
        if($member == true){
            return redirect('/admin/member/index')->with('success', 'Successfully created a member.');
        }else{
            return redirect('/admin/member/index')->with('error', 'Member creating error.');
        }
    }

    public function edit($id){
        $memberData = $this->memberService->getmemberData($id);
        $data['memberData'] = $memberData[0];
        $data['memberRoles'] = $this->memberService->getEnabledMemberRoles();
        $data['serviceGrades'] = $this->gradeService->getEnabledServiceGrades();
        $data['grades'] = $this->gradeService->getEnabledGrades();
        $data['title'] = 'Member Management';
        $data['slug'] = 'edit-member';
        $data['sub_page'] = 'Edit Member';
        //dd($data);
        return view('admin.member.edit', $data);
    }

    public function update(Request $request, $id) {
        $member = $this->memberService->updateMember($request, $id);
        if($member == true){
            return redirect('/admin/member/index')->with('success', 'Member data successfully updated.');
        }else{
            return redirect('/admin/member/index')->with('error', 'Member updating error.');
        }
    }
        
    public function destroy($id){

    }
        
    public function status(Request $request){

    }
    
    public function view(Request $request, $id) {
        $memberData = $this->memberService->getmemberData($id);
        $data['memberData'] = $memberData[0];
        $data['getPersonalDataType'] = $this->memberService->getPersonalDataType();
        $data['getPersonalData'] = $this->memberService->getPersonalData($id);
        //$data['getacademicYear'] = $this->academicYearService->listEnabledAcademicYear();
        //dd($data);
        $data['title'] = 'Member Management';
        $data['slug'] = 'view-member';
        $data['sub_page'] = 'View Member';
        return view('admin.member.view', $data);
    }

    public function memberpersonalDataStore(Request $request, $id){
        try{
            $memberpersonalDataStore = $this->memberService->memberpersonalDataStore($request, $id);
            return redirect()->route('member-view', [$id]);
            //return redirect()->route('member-view');
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function memberDataStore(Request $request, $id){
        try{
            return $this->memberService->memberDataStore($request, $id);
        }catch(\Exception $e){
            throw $e;
        }
    }
}
