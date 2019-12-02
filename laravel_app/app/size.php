<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    //
    protected $fillable = [
    	'size',
    ];
    public function belongsToManyMerchandise(){
    	return $this->belongsToMany('\App\Merchandise','merchandise_size','merch_id','size_id');
    }
}
