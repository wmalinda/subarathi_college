<?php
namespace App\Modules\Grade\Services;

use App\Exceptions\BaseException;
use App\Modules\Grade\Repositories\GradeRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;


class GradeService{
    protected $gradeRepo;

    public function __construct(){
        $this->gradeRepo = new GradeRepository();
    }

    public function createGrade($request){
        try{
            $data['grade'] = (isset($request['grade'])) ? $request['grade'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->gradeRepo->createGrade($data);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getGradeById(int $id){
        try{
            return $this->gradeRepo->getGradeById($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updateGradeById($request, $id){
        try{
            $data['grade'] = (isset($request['grade'])) ? $request['grade'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->gradeRepo->updateGradeById($data, $id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledGrades(){
        try{
            return $this->gradeRepo->getEnabledGrades();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledServiceGrades(){
        try{
            return $this->gradeRepo->getEnabledServiceGrades();
        }catch(\Exception $e){
            throw $e;
        }
    }
}
