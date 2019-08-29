<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doc extends Model
{
    protected $fillable =['user_id','folder_id','image','note'];

    public function folder() {
        return $this->belongsTo('App\folder');
    }
}
