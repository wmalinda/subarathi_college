<?php

namespace App\Modules\Member\Repositories;

use App\Modules\Member\Models\Member;
use App\Modules\Member\Models\MemberDetail;
use App\Modules\Member\Models\MemberRole;
use App\Modules\Member\Models\PersonalDataType;
use App\Modules\Member\Models\PersonalData;
use App\Modules\Grade\Models\ServiceGrade;
use App\Exceptions\BaseException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;

class MemberRepository{
    private $model;
    private $memberDetailmodel;
    private $memberRolemodel;
    private $personalDataTypeModel;
    private $personalDataModel;

    public function __construct(){
        $this->model = new Member();
        $this->memberDetailmodel = new MemberDetail();
        $this->memberRolemodel = new MemberRole();
        $this->personalDataTypeModel = new PersonalDataType();
        $this->personalDataModel = new PersonalData();
    }

    public function createMember($data){
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function createMemberDetails($data){
        try {
            return $this->memberDetailmodel->create($data);
        } catch (\Exception $e) {
            dd($e);
            throw $e->getMessage();
        }
    }

    public function getMemberById(int $id){
        try {
            return $this->model->find($id);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateMemberById($data, $id){
        try {
            $getMemberById = $this->getMemberById($id);
            $getMemberById->update($data);
            return $getMemberById;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    public function getMemberDetailByMemberId(int $id){
        try {
            return $this->memberDetailmodel->where('member_id', $id)->first();
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function updateMemberDetailsById($data, $id){
        try {
            $getMemberDetailByMemberId = $this->getMemberDetailByMemberId($id);
            $getMemberDetailByMemberId->update($data);
            return $getMemberDetailByMemberId;
        } catch (QueryException $e) {
            return new EventEditErrorException();
        }
    }

    public function getEnabledMemberRoles(){
        try{
            return $this->memberRolemodel->where('status', '=', 1)->get();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getmemberData(int $id){
        try {
            return Member::with('MemberDetail', 'MemberRole', 'MemberDetail.ServiceGrade')->where('id', $id)->get();
        } catch (\Exception $e) {
            dd($e);
            throw $e->getMessage();
        }
    }
    
    public function getPersonalDataType(){
        try {
            return $this->personalDataTypeModel->get();
        } catch (\Exception $e) {
            dd($e);
            throw $e->getMessage();
        }
    }

    public function memberpersonalDataStore($data){
        try {
            return $this->personalDataModel->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }

    public function getPersonalData($id){
        try {
            return PersonalData::with('PersonalDataType')->where(['member_id' => $id, 'status' => 1])->get();
            //return $this->personalDataModel->where(['member_id' => $id, 'status' => 1])->get();
        } catch (\Exception $e) {
            dd($e);
            throw $e->getMessage();
        }
    }

    public function memberDataStore($data){
        try {
            dd($data, 'ggg');
            return $this->personalDataModel->create($data);
        } catch (\Exception $e) {
            throw $e->getMessage();
        }
    }
}
