<?php

namespace App\Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberRole extends Model{
    use Notifiable;

    protected $table = 'member_roles';

    protected $fillable = [
        'code', 
        'role', 
        'description',
        'status'
    ];

    public function Member(){
    	return $this->hasOne('App\Modules\Member\Models\Member');
    }
}