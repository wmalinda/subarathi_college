<?php

namespace App\Modules\AcademicYear\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AcademicYear extends Model{
    use Notifiable;

    protected $table = 'academic_years';

    protected $fillable = [
        'academic_year', 
        'description', 
        'status'
    ];
}