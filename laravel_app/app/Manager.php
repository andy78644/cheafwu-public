<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //
    protected $primarykey='id';
    protected $fillable =[
    	"email",
    	"password",
    	"type",
    ];
}
