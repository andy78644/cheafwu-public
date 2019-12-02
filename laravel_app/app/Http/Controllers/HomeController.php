<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function indexPage(){
    	$Merchandise = \App\Merchandise::orderBy("id")->take(6)->get();
    	foreach($Merchandise as $merchandise){
    		if(!is_null($merchandise->photo)){
    			$merchandise->photo = url($merchandise->photo);
    		}
    	}
    	$binding=[
    		'title' => '巧福手套股份有限公司',
    		'merchandises' => $Merchandise,
    	];
    	return view('site.home',$binding);
    }
    public function aboutPage(){
    	$Merchandise = \App\Merchandise::orderBy("id")->take(6)->get();
    	foreach($Merchandise as $merchandise){
    		if(!is_null($merchandise->photo)){
    			$merchandise->photo = url($merchandise->photo);
    		}
    	}
    	$binding=[
    		'title' => '巧福手套股份有限公司',
    		'merchandises' => $Merchandise,
    	];
    	return view('site.about',$binding);
    }
    public function contactPage(){
    	$Merchandise = \App\Merchandise::orderBy("id")->take(6)->get();
    	foreach($Merchandise as $merchandise){
    		if(!is_null($merchandise->photo)){
    			$merchandise->photo = url($merchandise->photo);
    		}
    	}
    	$binding=[
    		'title' => '巧福手套股份有限公司',
    		'merchandises' => $Merchandise,
    	];
    	return view('site.contact',$binding);
    }
}
