<?php
namespace App\Modules\Classes\Services;

use App\Exceptions\BaseException;
use App\Modules\Classes\Repositories\ClassesRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassesService{
    protected $classesRepo;

    public function __construct(){
        $this->classesRepo = new ClassesRepository();
    }

    public function createClass($request){
        try{
            $data['grade_id'] = (isset($request['grade'])) ? $request['grade'] : '';
            $data['class'] = (isset($request['class'])) ? $request['class'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->classesRepo->createClass($data);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getClassById(int $id){
        try{
            return $this->classesRepo->getClassById($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updateClassById($request, $id){
        try{
            $data['grade_id'] = (isset($request['grade'])) ? $request['grade'] : '';
            $data['class'] = (isset($request['class'])) ? $request['class'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->classesRepo->updateClassById($data, $id);
        }catch(\Exception $e){
            throw $e;
        }
    }
}
