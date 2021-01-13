<?php

namespace App\Modules\AcademicYear\Repositories;

use App\Modules\AcademicYear\Models\AcademicYear;
use App\Exceptions\BaseException;
//use GuzzleHttp\Client;
//use GuzzleHttp\Exception\ClientException;
//use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class AcademicYearRepository{
    private $model;

    public function __construct(){
        $this->model = new AcademicYear();
    }

    public function createAcademicYear($data){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function getAcademicYearById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateAcademicYearById($data, $id){
        try {
            $getAcademicYearById = $this->getAcademicYearById($id);
            $getAcademicYearById->update($data);
            return $getAcademicYearById;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    /*public function findChannelById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function findChannelByMemberId(int $id){
        try {
            return $this->model->where('member_id', $id)->get();
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function createChannel($request){
        try {
            return $this->model->create($request);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }*/

    /*public function createMedia(MediaCreateRequest $request){
        try {
            return $this->mediaModel->create($request);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }*/

    /*public function createMediaCategory(Request $request){
        try {
            return $this->mediaCategoryModel->create($request);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }*/
}
