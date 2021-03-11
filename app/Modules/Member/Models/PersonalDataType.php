<?php

namespace App\Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PersonalDataType extends Model{
    use Notifiable;

    protected $table = 'personal_data_types';

    protected $fillable = [
        'type',
        'status'
    ];

    public function PersonalData(){
    	return $this->hasOne('App\Modules\Member\Models\PersonalData');
    }
}
