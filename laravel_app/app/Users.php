<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
}
