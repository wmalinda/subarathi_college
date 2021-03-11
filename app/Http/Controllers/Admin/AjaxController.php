<?php

namespace App\Http\Controllers\Admin;

use App\Modules\AcademicYear\Services\AcademicYearService;
use App\Modules\Grade\Services\GradeService;
use App\Modules\Classes\Services\ClassesService;
use App\Modules\Subject\Services\SubjectService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->academicYearService = new AcademicYearService();
        $this->gradeService = new GradeService();
        $this->classesService = new ClassesService();
        $this->subjectService = new SubjectService();
    }

    public function getEnabledAcademicYears(){
        try{
            return $this->academicYearService->listEnabledAcademicYear();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledGrades(){
        try{
            return $this->gradeService->getEnabledGrades();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledClassesByGradeId(Request $request){
        try{
            return $this->classesService->getEnabledClassesByGradeId($request['grade']);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledSubjects(){
        try{
            return $this->subjectService->getEnabledSubjects();
        }catch(\Exception $e){
            throw $e;
        }
    }
}
