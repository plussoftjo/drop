<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folder extends Model
{
    public $with =['docs'];
    protected $fillable = ['user_id','title','note'];

    public function docs() {
        return $this->hasMany('App\doc');
    }
}
