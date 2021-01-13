<?php

namespace App\Modules\Grade\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ServiceGrade extends Model{
    use Notifiable;

    protected $table = 'service_grades';

    protected $fillable = [
        'codeIndex', 
        'nameIndex', 
        'description',
        'status'
    ];

    public function MemberDetail(){
    	return $this->hasOne('App\Modules\Member\Models\MemberDetail');
    }
}