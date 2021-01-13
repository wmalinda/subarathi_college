<?php

namespace App\Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberDetail extends Model{
    use Notifiable;

    protected $table = 'member_details';

    protected $fillable = [
        'member_id', 
        'admition_number', 
        'grade_of_admition',
        'parent_name', 
        'occupation', 
        'office_address',
        'office_contact_number', 
        'special_skils', 
        'nic',
        'marital_status', 
        'spouse_name',
        'doa', 
        'service_grade', 
        'height_education_collification',
        'height_proficinal_collification', 
        'special_responsibilities', 
        'yor'
    ];

    public function Member(){
    	return $this->belongsTo('App\Modules\Member\Models\Member', 'member_id', 'id');
    }

    public function ServiceGrade(){
    	return $this->belongsTo('App\Modules\Grade\Models\ServiceGrade', 'service_grade', 'id');
    }
    
}
