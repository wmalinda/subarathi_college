<?php
namespace App\Modules\Member\Services;

use App\Exceptions\BaseException;
use App\Modules\Member\Repositories\MemberRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MemberService{
    protected $memberRepo;

    public function __construct(){
        $this->memberRepo = new MemberRepository();
    }

    public function createMember($request){
        try{
            $data = $request->request->all();
            $memberData['name_full'] = (isset($data['name_full'])) ? $data['name_full'] : '';
            $memberData['name_with_initials'] = (isset($data['name_with_initials'])) ? $data['name_with_initials'] : '';
            $memberData['dob'] = (isset($data['dob'])) ? $data['dob'] : '';
            $memberData['gender'] = (isset($data['gender'])) ? $data['gender'] : '';
            $memberData['member_role'] = (isset($data['role'])) ? $data['role'] : '';
            $memberData['status'] = (isset($data['status'])) ? 1 : 0;
            $memberData['membership_status'] = (isset($data['membership_status'])) ? 1 : 0;
            if(isset($data['role']) && $data['role'] == 4){
                $memberData['address'] = (isset($data['stu_address'])) ? $data['stu_address'] : '';
                $memberData['phone'] = (isset($data['stu_contact_number'])) ? $data['stu_contact_number'] : '';
                $memberData['mobile'] = (isset($data['stu_mobile_number'])) ? $data['stu_mobile_number'] : '';
                $memberData['email'] = (isset($data['stu_email'])) ? $data['stu_email'] : '';
            }elseif(isset($data['role']) && $data['role'] == 1 || $data['role'] == 2 || $data['role'] == 3 || $data['role'] == 5){
                $memberData['address'] = (isset($data['staff_address'])) ? $data['staff_address'] : '';
                $memberData['phone'] = (isset($data['staff_contact_number'])) ? $data['staff_contact_number'] : '';
                $memberData['mobile'] = (isset($data['staff_mobile_number'])) ? $data['staff_mobile_number'] : '';
                $memberData['email'] = (isset($data['staff_email'])) ? $data['staff_email'] : '';
            }

            $member = $this->memberRepo->createMember($memberData);
            if($member){
                $memberDetails['member_id'] = $member['id'];
                if(isset($data['role']) && $data['role'] == 4){
                    $memberDetails['admition_number'] = (isset($data['admition_number'])) ? $data['admition_number'] : '';
                    $memberDetails['grade_of_admition'] = (isset($data['grade_of_admition'])) ? $data['grade_of_admition'] : '';
                    $memberDetails['parent_name'] = (isset($data['parent_name'])) ? $data['parent_name'] : '';
                    $memberDetails['occupation'] = (isset($data['occupation'])) ? $data['occupation'] : '';
                    $memberDetails['office_address'] = (isset($data['office_address'])) ? $data['office_address'] : '';
                    $memberDetails['office_contact_number'] = (isset($data['office_contact_number'])) ? $data['office_contact_number'] : '';
                }elseif(isset($data['role']) && $data['role'] == 1 || $data['role'] == 2 || $data['role'] == 3 || $data['role'] == 5){
                    $memberDetails['nic'] = (isset($data['nic'])) ? $data['nic'] : '';
                    $memberDetails['marital_status'] = (isset($data['marital_status'])) ? $data['marital_status'] : '';
                    $memberDetails['spouse_name'] = (isset($data['spouse_name'])) ? $data['spouse_name'] : '';
                    $memberDetails['doa'] = (isset($data['doa'])) ? $data['doa'] : '';
                    $memberDetails['service_grade'] = (isset($data['service_grade'])) ? $data['service_grade'] : '';
                    $memberDetails['yor'] = (isset($data['yor'])) ? $data['yor'] : '';
                }

                $memberDetails = $this->memberRepo->createMemberDetails($memberDetails);
                if($request->has('profile_picture')){
                    $upath = 'uploads/profile_pictures/';
                    $file = $request->file('profile_picture');
                    $fileName = $member['id'] . '.' . $file->extension();
                    //$thumFile = $request->thumbnail->move(public_path($tupath), $thumFileName);
                    $thumFile = Image::make($file->path())->fit(600, 600)->save(public_path($upath.$fileName));
                    $memberImageData['profile_picture']= $upath.$fileName;
                    $memberupdate = $this->memberRepo->updateMemberById($memberImageData, $member['id']);
                }

                return true;
            }

            return false;
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getEnabledMemberRoles(){
        try{
            return $this->memberRepo->getEnabledMemberRoles();
        }catch(\Exception $e){
            throw $e;
        }
    }

    public function getmemberData($id){
        try{
            return $this->memberRepo->getmemberData($id);
        }catch(\Exception $e){
            throw $e;
        }
    }

    
}
