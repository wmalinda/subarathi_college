<?php
namespace App\Modules\Subject\Services;

use App\Exceptions\BaseException;
use App\Modules\Subject\Repositories\SubjectRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectService{
    protected $subjectRepo;

    public function __construct(){
        $this->subjectRepo = new SubjectRepository();
    }

    public function createSubject($request){
        try{
            $data['subject'] = (isset($request['subject'])) ? $request['subject'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->subjectRepo->createSubject($data);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getSubjectById(int $id){
        try{
            return $this->subjectRepo->getSubjectById($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updateSubjectById($request, $id){
        try{
            $data['subject'] = (isset($request['subject'])) ? $request['subject'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->subjectRepo->updateSubjectById($data, $id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledSubjects(){
        try{
            return $this->subjectRepo->getEnabledSubjects();
        }catch(\Exception $e){
            throw $e;
        }
    }
}
