<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Subject\Services\SubjectService;
use App\Modules\Subject\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class SubjectController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->subjectService = new SubjectService();
    }

    public function index(){
        $data['title'] = 'Subject Management';
        $data['slug'] = 'subject-list';
        $data['sub_page'] = 'Subject List';
        return view('admin.subject.index', $data);
    }

    public function data(DataTables $datatables){
        $query = Subject::select('*')->orderby('id', 'DESC');

        return $datatables->eloquent($query)
            ->addColumn('status', function (Subject $subject){
                if($subject->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('action', function (Subject $subject) {
                $editURl = url('admin/subject/' . $subject->id . '/edit');
                $dltURl = url('admin/subject/' . $subject->id . '/delete');
                
                return '<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function create(){
        $data['title'] = 'Subject Management';
        $data['slug'] = 'create-subject';
        $data['sub_page'] = 'Create Subject';
        return view('admin.subject.create', $data);
    }

    public function store(Request $request){
        $subject = $this->subjectService->createSubject($request);
        return redirect('/admin/subject/index')->with('success', 'Successfully created a subject.');
    }

    public function edit($id){
        $data['title'] = 'Subject Management';
        $data['slug'] = 'edit-subject';
        $data['sub_page'] = 'Edit Subject';
        $data['subject'] = $this->subjectService->getSubjectById($id);
        return view('admin.subject.edit', $data);
    }

    public function update(Request $request, $id) {
        $academicYear = $this->subjectService->updateSubjectById($request, $id);
        return redirect('/admin/subject/index')->with('success', 'Successfully updated a subject.');
    }
        
    public function destroy($id){

    }
        
    public function status(Request $request){
    }
    
}
