<?php

namespace App\Http\Controllers\Admin;

use App\Modules\Classes\Services\ClassesService;
use App\Modules\Grade\Services\GradeService;
use App\Modules\Classes\Models\Classes;
use App\Modules\Grade\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class ClassesController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->classesService = new ClassesService();
        $this->gradeService = new GradeService();
    }

    public function index(){
        $data['title'] = 'Class Management';
        $data['slug'] = 'class-list';
        $data['sub_page'] = 'Class List';
        return view('admin.class.index', $data);
    }

    public function data(DataTables $datatables){
        $query = Classes::with('Grade');

        return $datatables->eloquent($query)
            ->addColumn('status', function (Classes $classes){
                if($classes->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('grade', function (Classes $classes){
                return $classes->Grade->grade;
            })

            ->addColumn('action', function (Classes $classes) {
                $editURl = url('admin/class/' . $classes->id . '/edit');
                $dltURl = url('admin/class/' . $classes->id . '/delete');
                
                return '<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function create(){
        $data['grades'] = $this->gradeService->getEnabledGrades();
        $data['title'] = 'Class Management';
        $data['slug'] = 'create-class';
        $data['sub_page'] = 'Create Class';
        return view('admin.class.create', $data);
    }

    public function store(Request $request){
        $subject = $this->classesService->createClass($request);
        return redirect('/admin/class/index')->with('success', 'Successfully created a class.');
    }

    public function edit($id){
        $data['grades'] = $this->gradeService->getEnabledGrades();
        $data['title'] = 'Class Management';
        $data['slug'] = 'edit-class';
        $data['sub_page'] = 'Edit Class';
        $data['class'] = $this->classesService->getClassById($id);
        return view('admin.class.edit', $data);
    }

    public function update(Request $request, $id) {
        $class = $this->classesService->updateClassById($request, $id);
        return redirect('/admin/class/index')->with('success', 'Successfully updated a class.');
    }
        
    public function destroy($id){

    }
        
    public function status(Request $request){
    }
    
}
