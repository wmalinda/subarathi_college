<?php

namespace App\Modules\Subject\Repositories;

use App\Modules\Subject\Models\Subject;
use App\Exceptions\BaseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class SubjectRepository{
    private $model;

    public function __construct(){
        $this->model = new Subject();
    }

    public function createSubject($data){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function getSubjectById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateSubjectById($data, $id){
        try {
            $getSubjectById = $this->getSubjectById($id);
            $getSubjectById->update($data);
            return $getSubjectById;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    public function getEnabledSubjects(){
        try{
            return $this->model->where('status', '=', 1)->get();
        }catch(\Exception $e){
            throw $e;
        }
    }
}
