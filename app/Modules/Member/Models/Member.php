<?php

namespace App\Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model{
    use Notifiable;

    protected $table = 'members';

    protected $fillable = [
        'name_full', 
        'name_with_initials', 
        'member_role',
        'dob', 
        'gender', 
        'address',
        'phone', 
        'mobile', 
        'email',
        'profile_picture', 
        'status',
        'membership_status'
    ];

    public function MemberDetail(){
    	return $this->hasOne('App\Modules\Member\Models\MemberDetail');
    }

    public function MemberRole(){
    	return $this->belongsTo('App\Modules\Member\Models\MemberRole', 'member_role', 'id');
    }

    
}
