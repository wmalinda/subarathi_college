<?php

namespace App\Modules\Subject\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MemberSubject extends Model{
    use Notifiable;

    protected $table = 'member_grades';

    protected $fillable = [
        'member_id', 
        'subject_id', 
        'academic_year'
    ];
}
