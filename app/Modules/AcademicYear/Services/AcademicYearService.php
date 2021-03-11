<?php
namespace App\Modules\AcademicYear\Services;

use App\Exceptions\BaseException;

use App\Modules\AcademicYear\Repositories\AcademicYearRepository;
//use GuzzleHttp\Client;
//use GuzzleHttp\Exception\ClientException;
//use GuzzleHttp\Exception\BadResponseException;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Lang;
//use UrlSigner;


class AcademicYearService{
    protected $academicYearRepo;

    public function __construct(){
        $this->academicYearRepo = new AcademicYearRepository();
    }

    public function createAcademicYear($request){
        try{
            $data['academic_year'] = (isset($request['academic_year'])) ? $request['academic_year'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->academicYearRepo->createAcademicYear($data);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getAcademicYearById(int $id){
        try{
            return $this->academicYearRepo->getAcademicYearById($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function updateAcademicYearById($request, $id){
        try{
            $data['academic_year'] = (isset($request['academic_year'])) ? $request['academic_year'] : '';
            $data['description'] = (isset($request['description'])) ? $request['description'] : '';
            $data['status'] = (isset($request['status'])) ? 1 : 0;
            return $this->academicYearRepo->updateAcademicYearById($data, $id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function listEnabledAcademicYear(){
        try{
            return $this->academicYearRepo->listEnabledAcademicYear();
        }catch(\Exception $e){
            throw $e;
        }
    }




    /*public function listChannel($request){
        try{
            //
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function createChannel($request){
        try{
            return $this->channelRepo->createChannel($request);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function findChannelById(int $id){
        try{
            return $this->channelRepo->findChannelById($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function findChannelByMemberId(int $id){
        try{
            return $this->channelRepo->findChannelByMemberId($id);
        }catch(\Exception $e){
            throw $e;
        }
    }*/
}
