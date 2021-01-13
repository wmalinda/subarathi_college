<?php

namespace App\Modules\Grade\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberGrade extends Model{
    use Notifiable;

    protected $table = 'member_grades';

    protected $fillable = [
        'member_id', 
        'grade_id', 
        'academic_year'
    ];
}
