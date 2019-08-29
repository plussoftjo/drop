<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class need extends Model
{
    public $with = ['user'];
    protected $fillable =['user_id','location','PatientName','PhoneNumber','PatientFileNumber','HospitalName','BloodTypeRequest','NumberOfUnit','Note'];
    
    public function user() {
        return $this->belongsTo('App\user');
    }
}
