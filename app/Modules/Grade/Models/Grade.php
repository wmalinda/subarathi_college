<?php

namespace App\Modules\Grade\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Grade extends Model{
    use Notifiable;

    protected $table = 'grades';

    protected $fillable = [
        'grade', 
        'description', 
        'status'
    ];

    public function Classes(){
    	return $this->hasMany('App\Modules\Classes\Models\Classes');
    }
}
