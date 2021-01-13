<?php

namespace App\Modules\Subject\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subject extends Model{
    use Notifiable;

    protected $table = 'subjects';

    protected $fillable = [
        'subject', 
        'description', 
        'status'
    ];
}