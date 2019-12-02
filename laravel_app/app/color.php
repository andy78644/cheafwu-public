<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    //
    protected $fillable = [
    	'color',
    ];
    public function belongsToManyMerchandise(){
    	return $this->belongsToMany('\App\Merchandise','merchandise_color','Merch_id','color_id');
    }
}
