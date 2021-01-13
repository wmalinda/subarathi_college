<?php

namespace App\Modules\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Classes extends Model{
    use Notifiable;

    //protected $table = 'classes';

    protected $fillable = [
        'grade_id',
        'class', 
        'description', 
        'status'
    ];

    public function Grade(){
        return $this->belongsTo('App\Modules\Grade\Models\Grade', 'grade_id', 'id');
    }
}
