<?php

namespace App\Http\Controllers\Admin;

use App\Modules\AcademicYear\Services\AcademicYearService;
use App\Modules\AcademicYear\Models\AcademicYear;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;

class AcademicYearContrtoller extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->academicYearService = new AcademicYearService();
    }

    public function index(){
        $data['title'] = 'Academic Year Management';
        $data['slug'] = 'academic-year-list';
        $data['sub_page'] = 'Academic Year List';
        return view('admin.academic_year.index', $data);
    }

    public function data(DataTables $datatables){
        $query = AcademicYear::select('*')->orderby('id', 'DESC');

        return $datatables->eloquent($query)
            ->addColumn('status', function (AcademicYear $academicYear){
                if($academicYear->status == 1){
                    $status = 'Active';
                }else{
                    $status = 'Dissable';
                }
                
                return $status;
            })

            ->addColumn('action', function (AcademicYear $academicYear) {
                $editURl = url('admin/academic-year/' . $academicYear->id . '/edit');
                $dltURl = url('admin/academic-year/' . $academicYear->id . '/delete');
                
                return '<a href="' . $editURl . '" class="btn btn-sm btn-primary ">Edit <i class="fa fa-edit"></i></a>'.
                    '&nbsp;<a href="' . $dltURl . '" class="btn btn-sm btn-danger">Delete </a>';
            })
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function create(){
        $data['title'] = 'Academic Year Management';
        $data['slug'] = 'create-academic-year';
        $data['sub_page'] = 'Create Academic Year';
        return view('admin.academic_year.create', $data);
    }

    public function store(Request $request){
        $academicYear = $this->academicYearService->createAcademicYear($request);
        return redirect('/admin/academic-year/index')->with('success', 'Successfully created an academic year.');
    }

    public function edit($id){
        $data['title'] = 'Academic Year Management';
        $data['slug'] = 'edit-academic-year';
        $data['sub_page'] = 'Edit Academic Year';
        $data['academicYear'] = $this->academicYearService->getAcademicYearById($id);
        return view('admin.academic_year.edit', $data);
    }

    public function update(Request $request, $id) {
        $academicYear = $this->academicYearService->updateAcademicYearById($request, $id);
        return redirect('/admin/academic-year/index')->with('success', 'Successfully updated an academic year.');
    }
        
    public function destroy($id){

    }
        
    public function status(Request $request){

    }

    public function getEnabledList(Request $ewquest){
        try{
            return $this->academicYearService->listEnabledAcademicYear();
        }catch(\Exception $e){
            throw $e;
        }
    }
    
}
