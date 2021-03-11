<?php

namespace App\Modules\Member\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PersonalData extends Model{
    use Notifiable;

    protected $table = 'personal_data';

    protected $fillable = [
        'member_id',
        'type_id',
        'title',
        'description'
    ];

    public function PersonalDataType(){
    	return $this->belongsTo('App\Modules\Member\Models\PersonalDataType', 'type_id', 'id');
    }
}
