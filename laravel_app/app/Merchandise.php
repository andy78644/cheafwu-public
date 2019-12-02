<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    //
    protected $fillable = [
    	'type',
    	'stype',
    	'number',
    	'name',
    	'discript',
	];
    public function color(){
    	return $this->belongsToMany('App\color','merchandise_color','Merch_id','color_id');
    }
    public function size(){
    	return $this->belongsToMany('App\size','merchandise_size','Merch_id','size_id');
    }

}
