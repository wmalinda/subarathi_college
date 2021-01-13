<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Grade\Services\GradeService;
use App\Modules\Grade\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class GradeController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->gradeService = new GradeService();
    }

    public function index(){
        $data['title'] = 'Grade Management';
        $data['slug'] = 'grade-list';
        $data['sub_page'] = 'Grade List';
        return view('admin.grade.index', $data);
    }

    public function data(DataTables $datatables){
        $query = Grade::select('*')->orderby('id', 'DESC');

        return $datatables->eloquent($query)
            ->addColumn('status', function (Grade $grade){
                if($grade->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('action', function (Grade $grade) {
                $editURl = url('admin/grade/' . $grade->id . '/edit');
                $dltURl = url('admin/grade/' . $grade->id . '/delete');
                
                return '<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function create(){
        $data['title'] = 'Grade Management';
        $data['slug'] = 'create-grade';
        $data['sub_page'] = 'Create Grade';
        return view('admin.grade.create', $data);
    }

    public function store(Request $request){
        $grade = $this->gradeService->createGrade($request);
        return redirect('/admin/grade/index')->with('success', 'Successfully created a grade.');
    }

    public function edit($id){
        $data['title'] = 'Grade Management';
        $data['slug'] = 'edit-grade';
        $data['sub_page'] = 'Edit Grade';
        $data['grade'] = $this->gradeService->getGradeById($id);
        return view('admin.grade.edit', $data);
    }

    public function update(Request $request, $id) {
        $grade = $this->gradeService->updateGradeById($request, $id);
        return redirect('/admin/grade/index')->with('success', 'Successfully updated an grade.');
    }
        
    public function destroy($id){

    }
        
    public function status(Request $request){
    }
    
}
