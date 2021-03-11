<?php

namespace App\Modules\Classes\Repositories;

use App\Modules\Classes\Models\Classes;
use App\Exceptions\BaseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class ClassesRepository{
    private $model;

    public function __construct(){
        $this->model = new Classes();
    }

    public function createClass($data){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function getClassById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateClassById($data, $id){
        try {
            $getClassById = $this->getClassById($id);
            $getClassById->update($data);
            return $getClassById;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    public function getEnabledClassesByGradeId(int $id){
        try {
            return $this->model->where('grade_id', $id)->where('status', 1)->get();
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
