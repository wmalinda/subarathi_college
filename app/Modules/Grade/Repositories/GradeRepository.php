<?php

namespace App\Modules\Grade\Repositories;

use App\Modules\Grade\Models\Grade;
use App\Modules\Grade\Models\ServiceGrade;
use App\Exceptions\BaseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class GradeRepository{
    private $model;
    private $serviceGrademodel;

    public function __construct(){
        $this->model = new Grade();
        $this->serviceGrademodel = new ServiceGrade();
    }

    public function createGrade($data){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function getGradeById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateGradeById($data, $id){
        try {
            $getGradeById = $this->getGradeById($id);
            $getGradeById->update($data);
            return $getGradeById;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    public function getEnabledGrades(){
        try{
            return $this->model->where('status', '=', 1)->get();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledServiceGrades(){
        try{
            return $this->serviceGrademodel->where('status', '=', 1)->get();
        }catch(\Exception $e){
            throw $e;
        }
    }
}
